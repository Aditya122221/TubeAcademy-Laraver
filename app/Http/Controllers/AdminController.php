<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\EmailModel;

class AdminController extends Controller
{
    public function index()
    {
        $teacherData = TeacherModel::all();
        $studentData = StudentModel::all();
        $queries = EmailModel::where("status", "pending")->get();
        return view("MainPage.adminHomePage", compact("teacherData", "studentData", "queries"));
    }

    public function profile()
    {
        return view('MainPage.adminProfile');
    }

    public function messageReply(Request $request)
    {
        $request->validate([
            'replyMessage' => 'required'
        ]);

        $messag = EmailModel::where('query_ID', (int) $request->queryID)->first();
        date_default_timezone_set("Asia/Kolkata");

        $messag->replyMessage = $request->replyMessage;
        $messag->resolveDate = date("Y-m-d H:i:s");
        $messag->status = "resolved";
        $messag->save();

        return redirect('/admin/home');
    }
}
