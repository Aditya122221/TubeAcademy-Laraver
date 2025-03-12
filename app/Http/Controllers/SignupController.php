<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class SignupController extends Controller
{
    public function index(){
        return view("MainPage.signup");
    }

    public function signup(Request $request)
    {
        $request->validate([
            'fName' => 'required|string',
            'lName' => 'required|string',
            'pNumber' => 'required|string',
            'role' => 'required',
            'password' => 'required',
        ]);

        $roles = [
            "admin" => AdminModel::class,
            "Teacher" => TeacherModel::class,
            "Student" => StudentModel::class
        ];

        if (!isset($roles[$request["role"]])) {
            return redirect('/signup')->with('error', 'Invalid Role');
        }

        $model = $roles[$request["role"]];
        $user = $model::where("pNumber", $request["pNumber"])->first();

        if ($user) {
            return redirect('/signup')->with('error', 'User Already Exist');
        }

        $min = ["admin" => 10, "Teacher" => 1000, "Student" => 100000][$request["role"]];
        $max = ["admin" => 99, "Teacher" => 9999, "Student" => 999999][$request["role"]];

        do {
            $Reg_ID = rand($min, $max);
            $user = $model::where("Registration_ID", $Reg_ID)->first();
        } while ($user);

        $newUser = new $model();
        $newUser->Registration_ID = $Reg_ID;
        $newUser->avatar = "";
        $newUser->fName = $request["fName"];
        $newUser->lName = $request["lName"];
        $newUser->pNumber = $request["pNumber"];
        $newUser->role = $request["role"];
        $newUser->password = $request["password"];
        $newUser->email = !empty($request['email']) ? $request['email'] : null;
        $newUser->address = "";
        $newUser->save();

        return redirect('/signup')->with('success', 'Successfully Registered');
    }
}
