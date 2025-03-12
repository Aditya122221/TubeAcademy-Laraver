<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailModel;

class EmailController extends Controller
{
    public function index(){
        return view("MainPage.contact");
    }

    public function email(Request $request){
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "message" => "required"
        ]);
        date_default_timezone_set("Asia/Kolkata");
        $newUser = new EmailModel();
        $newUser->fullname = $request->fullname;
        $newUser->email = $request->email;
        $newUser->message = $request->message;
        $newUser->date = date("Y-m-d H:i:s");
        $newUser->save();

        return view("MainPage.contact")->with("success", "Email Sent");
    }
}
