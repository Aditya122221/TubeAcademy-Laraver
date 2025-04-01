<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\UploadVideoModel;
use Illuminate\Support\Facades\Session;

class TeacherProfileController extends Controller
{
    public function fetchData()
    {
        session_start();
        if (!isset($_SESSION["Reg_ID"])) {
            return redirect("/");
        }
        Session::put("user_id", $_SESSION["Reg_ID"]);
        $user = TeacherModel::where("Registration_ID", $_SESSION["Reg_ID"])->first();
        Session::put("name", $user->fName." ".$user->lName);

        return view("MainPage.teacherProfile", compact('user'));
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            "VTitle" => "required",
            "SubjectName" => "required|in:Chemistry,Physics,Mathematics,Biology",
            "classIn" => "required|in:IX,X,XI,XII",
            "thumbnail" => "required|mimes:jpg,jpeg,png|max:5000",
            "video" => "required|mimes:mkv,mp4",
        ]);

        $thumbnailPath = $request->file("thumbnail")->store("thumbnail", "public");
        $videoPath = $request->file("video")->store("video", "public");

        do {
            $Video_ID = rand(100000, 999999);
            $video = UploadVideoModel::where("Video_ID", $Video_ID)->first();
        } while ($video);

        $uploadVideo = new UploadVideoModel();
        $uploadVideo->Video_ID = $Video_ID;
        $uploadVideo->Registration_ID = Session::get("user_id");
        $uploadVideo->thumbnail = $thumbnailPath;
        $uploadVideo->title = $request->VTitle;
        $uploadVideo->subjectName = $request->SubjectName;
        $uploadVideo->classIn = $request->classIn;
        $uploadVideo->teacherName = Session::get("name");
        $uploadVideo->duration = 0;
        $uploadVideo->video = $videoPath;
        $uploadVideo->views = 0;
        $uploadVideo->save();

        return redirect("/teacher/profile")->with("success", "Video Uploaded Successfully");
    }
}
