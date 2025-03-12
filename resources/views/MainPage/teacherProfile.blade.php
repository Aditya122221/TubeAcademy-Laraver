<?php
if (!isset($_SESSION['Reg_ID'])) {
    header('Location: /');
    exit();
}

if ($_SESSION['role'] != 'Teacher') {
    header('Location: /');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/teacherProfile.css') }}">
    <title>TubeAcademy | Profile</title>
</head>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- "selectedOne" class is statically added for demonstration; adjust as needed -->
                <div class="left1 selectedOne l1" onclick="showAccount()">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="showUpload()">
                    <i class="fa-solid fa-file-arrow-up icon"></i>
                    <span class="ttt">Upload Video</span>
                </div>
                <a href="/logout" class="left1 left2">
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                </a>
                <a href="/teacher/home" class="left1 left3">Home</a>
            </div>
            <div class="right">
                <div class="aright">
                    <!-- Replace this with the content of TeacherRightOne -->
                    @include('SubPage.TeacherProfile.teacherProfileOne')
                </div>
                <div class="bright">
                    <!-- Replace this with the content of TeacherRightTwo -->
                    @include('SubPage.TeacherProfile.teacherProfileTwo')
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/teacherProfile.js')}}"></script>
</body>

</html>
