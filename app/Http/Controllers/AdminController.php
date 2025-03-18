<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\EmailModel;

class AdminController extends Controller
{
    public function index(){
        $teacherData = TeacherModel::all();
        $studentData = StudentModel::all();
        $queries = EmailModel::all();
        return view("MainPage.adminHomePage", compact("teacherData", "studentData", "queries"));
    }

    public function profile()
    {
        return view('MainPage.adminProfile');
    }
}
