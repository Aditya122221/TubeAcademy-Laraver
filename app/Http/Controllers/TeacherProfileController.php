<?php

namespace App\Http\Controllers;

use App\Models\EmailModel;
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
        $queries = EmailModel::where("Registration_ID", $user->Registration_ID)->get();

        return view("MainPage.teacherProfile", compact('user', 'queries'));
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            "VTitle" => "required",
            "SubjectName" => "required|in:Chemistry,Physics,Mathematics,Biology",
            "classIn" => "required|in:IX,X,XI,XII",
        ]);

        dd($request->thumbnail, $request->video);

        $thumbnailPath = "";
        $videoPath = "";

        if($request->hasFile("thumbnail")){
            $request->validate([
                "thumbnail" => "required|mimes:jpg,png,jpeg|max:5000",
            ]);
            $thumbnailPath = $request->file("thumbnail")->store("thumbnail");
        }

        if($request->hasFile("video")){
            $request->validate([
                "video" => "required|mimes:mp4",
            ]);
            $videoPath = $request->file("video")->store("video");
        }

        do {
            $Video_ID = rand(100000, 999999);
            $video = UploadVideoModel::where("Video_ID", $Video_ID)->first();
        } while ($video);



        $uploadVideo = new UploadVideoModel();
        $uploadVideo->Video_ID = $Video_ID;
        $uploadVideo->Registration_ID = Session::get("user_id");
        $uploadVideo->thumbnail = $thumbnailPath;
        $uploadVideo->title = $request["VTitle"];
        $uploadVideo->subjectName = $request["SubjectName"];
        $uploadVideo->teacherName = Session::get("name");
        $uploadVideo->class = $request["classIn"];
        $uploadVideo->duration = 0;
        $uploadVideo->video = $videoPath;
        $uploadVideo->views = 0;
        $done = $uploadVideo->save();

        if (!$done) {
            return redirect("/teacher/profile")->with("error", "Video Upload Failed");
        }

        return redirect("/teacher/profile")->with("success", "Video Uploaded Successfully");
    }
}
