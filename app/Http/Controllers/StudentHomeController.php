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
}
