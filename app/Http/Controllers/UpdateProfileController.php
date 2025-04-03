<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    public function index($regid, $role)
    {
        if (!$regid || !$role) {
            return redirect('/');
        }

        $roles = [
            "admin" => AdminModel::class,
            "Teacher" => TeacherModel::class,
            "Student" => StudentModel::class
        ];

        if (!isset($roles[$role])) {
            return redirect('/');
        }

        $model = $roles[$role];
        $user = $model::where("Registration_ID", (int)$regid)->first();

        if (!$user) {
            return redirect('/');
        }

        // Instead of storing the whole user object, store just the ID
        Session::put("user_id", (int)$regid);
        Session::put("user_role", $role);

        return view("MainPage.profileUpdate", compact("user"));
    }

    public function update(Request $request)
    {
        $request->validate([
            "fname" => "required",
            "lname" => "required",
            "avatar" => "nullable|mimes:jpg,png,jpeg|max:10000"
        ]);

        // Retrieve user based on ID stored in session
        $userId = Session::get("user_id");
        $role = Session::get("user_role");

        $roles = [
            "admin" => AdminModel::class,
            "Teacher" => TeacherModel::class,
            "Student" => StudentModel::class
        ];

        if (!$userId || !isset($roles[$role])) {
            return redirect('/');
        }

        $model = $roles[$role];
        $user = $model::where("Registration_ID", $userId)->first();

        if (!$user) {
            return redirect('/');
        }

        $avatarPath = $user->avatar;
        // dd($request->hasFile('avatar'));

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('image');
        }


        $user->update([
            "avatar" => str_replace('public/', 'storage/', $avatarPath),
            "fName" => $request["fname"],
            "lName" => $request["lname"],
            "email" => $request["email"] ? $request["email"] : null,
            "address" => $request["address"],
        ]);

        return redirect("/")->with("success", "Profile updated successfully.");
    }
}
