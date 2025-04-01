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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <div class="left1 selectedOne l1" onclick="showSection('l1')">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="showSection('l2')">
                    <i class="fa-solid fa-question"></i>
                    <span class="ttt">QMS</span>
                </div>
                <!-- The onClick functionality is removed. Add JavaScript if needed. -->
                <a href="/logout" class="left1 left2" >
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                  </a>
                <a href="/student/home" class="left1 left3">Home</a>
            </div>
            <div class="aright">
                @include('SubPage.StudentProfile.studentProfileOne')
            </div>
            <div class="bright">
                @include('SubPage.StudentProfile.studentProfileTwo')
            </div>
        </div>
    </div>

</body>
<script src="{{asset('js/studentProfile.js')}}"></script>

</html>
