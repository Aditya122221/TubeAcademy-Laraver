<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\TeacherModel;
use App\Models\StudentModel;
use App\Models\EmailModel;

class AdminProfileController extends Controller
{
    public function fetchData()
    {
        session_start();
        if(!isset($_SESSION["Reg_ID"])){
            return redirect("/");
        }
        $user = AdminModel::where("Registration_ID", $_SESSION["Reg_ID"])->first();
        $teacherData = TeacherModel::all();
        $studentData = StudentModel::all();
        $queries = EmailModel::all();

        return view("MainPage.adminProfile", compact('user', 'teacherData', 'studentData', 'queries'));
    }
}
