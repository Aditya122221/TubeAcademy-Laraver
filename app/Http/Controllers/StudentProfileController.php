<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\EmailModel;

class StudentProfileController extends Controller
{
    public function fetchdata(){
        session_start();
        if(!isset($_SESSION["Reg_ID"])){
            return redirect("/");
        }
        $user = StudentModel::where("Registration_ID", $_SESSION["Reg_ID"])->first();
        $queries = EmailModel::where("Registration_ID", $user->Registration_ID)->get();

        return view("MainPage.studentProfile", compact("user", "queries"));
    }
}
