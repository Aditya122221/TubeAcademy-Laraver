<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadVideoModel;
use Illuminate\Support\Facades\Storage;

class VideoEditController extends Controller
{
    public function index($video_id = null)
    {
        if (!$video_id) {
            return "No Parameter";
        }

        $video = UploadVideoModel::where("Video_ID", (int)$video_id)->first();
        if(!$video){
            return redirect('/');
        }

        return view("MainPage.videoEdit", compact("video"));
    }

    public function update(Request $request, $video_id){
        $request->validate([
            "SubjectName" => "in:Mathematics,Physics,Chemistry,Biology",
            "forClass" => "in:IX,X,XI,XII",
        ]);

        $video = UploadVideoModel::where("Video_ID", (int)$video_id)->first();
        if(!$video){
            return "No video found";
        }
        $thumbnailPath = $video->thumbnail;
        $videoPath = $video->video;
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                "thumbnail" => "mimes:jpg,png,jpeg|max:5000",
            ]);
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail');

            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
        }

        if ($request->hasFile('video')) {
            $request->validate([
                "video" => "mimes:mkv,mp4",
            ]);
            $videoPath = $request->file('video')->store('video');

            if ($video->video) {
                Storage::disk('public')->delete($video->video);
            }
        }
        $done = $video->update([
            "title" => $request["VTitle"],
            "subjectName" => $request["SubjectName"],
            "forClass" => $request["forClass"],
            "thumbnail" => $thumbnailPath,
            "video" => $videoPath
        ]);

        if(!$done){
            return redirect("/videoedit/{$video_id}")->with("error", "Something went wrong. Try Again");
        }

        return redirect('/teacher/home');
    }

    public function delete($video_id){
        if($video_id == null){
            return redirect('/');
        }

        $deletedData = UploadVideoModel::where("Video_ID", (int) $video_id)->first();

        Storage::disk('public')->delete($deletedData->thumbnail);
        Storage::disk('public')->delete($deletedData->video);
        $deletedData->delete();

        return redirect('/');
    }
}
