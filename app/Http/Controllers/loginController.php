<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class loginController extends Controller
{
    public function index()
    {
        return view("MainPage.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "Reg_ID" => "required",
            "password" => "required",
            "role" => "required"
        ]);
        $Reg_ID = (int) $data['Reg_ID'];

        if ($data["role"] == 'admin') {
            $admin = AdminModel::where('Registration_ID', $Reg_ID)->first();
            if ($admin) {
                if ($admin->password == $data['password']) {
                    session_start();
                    $_SESSION["role"] = $data['role'];
                    $_SESSION['Reg_ID'] = $Reg_ID;
                    return redirect('/admin/home');
                } else {
                    return redirect('/')->with('error', 'Invalid Password');
                }
            } else {
                return redirect('/')->with('error', 'User Not Found');
            }
        } else if ($data["role"] == "Teacher") {
            $teacher = TeacherModel::where('Registration_ID', $Reg_ID)->first();
            if ($teacher) {
                if ($teacher->password == $data['password']) {
                    session_start();
                    $_SESSION["role"] = $data['role'];
                    $_SESSION['Reg_ID'] = $Reg_ID;
                    return redirect('/teacher/home');
                } else {
                    return redirect('/')->with('error', 'Invalid Password');
                }
            } else {
                return redirect('/')->with('error', 'User Not Found');
            }
        } else if ($data['role'] == "Student") {
            $student = StudentModel::where('Registration_ID', $Reg_ID)->first();
            if ($student) {
                if ($student->password == $data['password']) {
                    session_start();
                    $_SESSION["role"] = $data['role'];
                    $_SESSION['Reg_ID'] = $Reg_ID;
                    return redirect('/student/home');
                } else {
                    return redirect('/')->with('error', 'Invalid Password');
                }
            } else {
                return redirect('/')->with('error', 'User Not Found');
            }
        }
    }
}
