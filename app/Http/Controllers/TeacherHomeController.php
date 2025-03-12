<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadVideoModel;

class TeacherHomeController extends Controller
{
    public function index(){
        session_start();
        if(!isset($_SESSION["Reg_ID"])){
            return redirect("/");
        }
        $videos = UploadVideoModel::where("Registration_ID", $_SESSION["Reg_ID"])->get();
        return view("MainPage.teacherHomePage", compact("videos"));
    }
}
