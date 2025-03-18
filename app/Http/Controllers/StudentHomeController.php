<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadVideoModel;

class StudentHomeController extends Controller
{
    public function index(){
        $videos = UploadVideoModel::all();
        return view("MainPage.studentHomePage", compact("videos"));
    }

    public function nine(){
        $nineVideos = UploadVideoModel::where("classIn", "IX")->get();
        return view("MainPage.classnine", compact("nineVideos"));
    }

    public function ten(){
        $tenVideos = UploadVideoModel::where("classIn", "X")->get();
        return view("MainPage.classten", compact("tenVideos"));
    }

    public function eleven(){
        $elevenVideos = UploadVideoModel::where("classIn", "XI")->get();
        return view("MainPage.classeleven", compact("elevenVideos"));
    }

    public function twelve(){
        $twelveVideos = UploadVideoModel::where("classIn", "XII")->get();
        return view("MainPage.classtwelve", compact("twelveVideos"));
    }
}
