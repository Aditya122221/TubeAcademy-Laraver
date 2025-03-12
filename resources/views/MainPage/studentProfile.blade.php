<?php
if(!isset($_SESSION['role'])){
    header("Location: /");
    exit;
}

if($_SESSION['role'] != 'Student'){
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/studentProfile.css')}}">
    <title>TubeAcademy | Profile</title>
</head>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{asset('Images/Logo.png')}}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- Adjust "selectedOne" class as needed -->
                <div class="left1 selectedOne">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <!-- The onClick functionality is removed. Add JavaScript if needed. -->
                <a href="/logout" class="left1 left2" >
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                  </a>
                <a href="/student/home" class="left1 left3">Home</a>
            </div>
            <div class="right">
                <!-- Replace this comment with the content of StudentRightOne component -->
                @include('SubPage.StudentProfile.studentProfileOne')
            </div>
        </div>
    </div>

</body>

</html>
