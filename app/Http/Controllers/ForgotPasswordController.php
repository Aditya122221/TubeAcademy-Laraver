<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function index($regis_id, $pnumber, $role)
    {
        if($regis_id == ""){
            return redirect("/")->with("error", "Registration ID is required");
        } elseif($pnumber == ""){
            return redirect("/")->with("error", "Phone Number is required");
        } elseif ($role == ""){
            return redirect("/")->with("error", "Role is required");
        }
        $roles = [
            "fadmin" => AdminModel::class,
            "fTeacher" => TeacherModel::class,
            "fStudent" => StudentModel::class
        ];

        $model = $roles[$role];
        $user = $model::where("Registration_ID", (int)$regis_id)->first();
        if ($user) {
            if ($user["pNumber"] == $pnumber) {
                Session::put("user", $user);
                return view("MainPage.passwordUpdate");
            } else {
                return redirect("/")->with("error", "Phone Number is not valid");
            }
        } else {
            return redirect("/")->with("error", "User Not Found");
        }
    }

    public function update(Request $request)
    {
        if (Session::get("user") == "") {
            return redirect('/');
        }

        $request->validate([
            "password" => [
                "required",
                "min:8",
                "regex:/[a-z]/",
                "regex:/[A-Z]/",
                "regex:/[0-9]/",
                "regex:/[@$!%*?&]/",
            ],
            "cpassword" => "required|same:password"
        ]);

        $user = Session::get("user");


        $done = $user->update([
            "password" => $request["password"]
        ]);

        if(!$done){
            return redirect("/")->with("error","Something went wrong");
        }

        return redirect("/")->with("success","Password Updated");
    }
}
