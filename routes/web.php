<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\TeacherHomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\VideoEditController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StudentHomeController;

Route::get('/', [LoginController::class, 'index'])->name('backtologin');
Route::post('/', [LoginController::class, 'login']);
Route::get('/visiting/{regis_id}/{pnumber}/{role}', [ForgotPasswordController::class, 'index'])->name('visiting');
Route::post('/forgotpass', [ForgotPasswordController::class,'update'])->name('passwordupdating');

Route::get('/signup', [SignupController::class, "index"]);
Route::post('/signup', [SignupController::class, 'signup']);

Route::get('/contact', [EmailController::class, 'index']);
Route::post('/contact', [EmailController::class, 'email']);

Route::get('/askai', function () {
    return view('MainPage.askai');
});

//Profile Routing

Route::get('/admin/profile', [AdminProfileController::class, 'fetchData']);
Route::get('/teacher/profile', [TeacherProfileController::class, 'fetchData']);
Route::post('/teacher/profile', [TeacherProfileController::class,'uploadVideo']);
Route::get('/student/profile', [StudentProfileController::class, 'fetchData']);
Route::get('/update/{regid}/{role}', [UpdateProfileController::class, 'index'])->name('profileupdate');
Route::post('/updating', [UpdateProfileController::class,'update'])->name('profileupdating');

//Home Routing

Route::get('/admin/home', [AdminController::class, 'index']);
Route::post('/reply', [AdminController::class, 'messageReply']);
Route::get('/teacher/home', [TeacherHomeController::class,'index']);

Route::get('/student/home', [StudentHomeController::class, 'index']);
Route::get('/student/nine', [StudentHomeController::class, 'nine']);
Route::get('/student/ten', [StudentHomeController::class, 'ten']);
Route::get('/student/eleven', [StudentHomeController::class, 'eleven']);
Route::get('/student/twelve', [StudentHomeController::class, 'twelve']);

Route::get('/videoedit/{video_id}', [VideoEditController::class, 'index'])->name('editing');
Route::post('/videoedit/{video_id}', [VideoEditController::class, 'update'])->name("updating");
Route::get('/videodelete/{video_id}', [VideoEditController::class, 'delete'])->name("deleting");

Route::get('/logout', function () {
    return view('MainPage.logout');
});

Route::fallBack(function () {
    return view("MainPage.error");
});
