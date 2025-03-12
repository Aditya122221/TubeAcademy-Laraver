<?php
// session_start();
if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}

if ($_SESSION['role'] != 'admin') {
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
    <link rel="stylesheet" href="{{ asset('css/adminProfile.css') }}">
    <title>TubeAcademy | Profile</title>
</head>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- Adjust the "selectedOne" class as needed -->
                <div class="left1 selectedOne l1" onclick="showAccount()">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="teacherDetail()">
                    <i class="fa-regular fa-address-card icon"></i>
                    <span class="ttt">Registered Teacher</span>
                </div>
                <div class="left1 l3" onclick="studentDetail()">
                    <i class="fa-regular fa-address-card icon"></i>
                    <span class="ttt">Registered Student</span>
                </div>
                <a href="/signup" class="left1 left2">Register a Member</a>
                <div class="left1 l4" onclick="queryDetail()">
                    <i class="fa-solid fa-clipboard-question icon"></i>
                    <span class="ttt">Query</span>
                </div>
                <a href="/logout" class="left1 left2">
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                </a>
                <a href="/admin/home" class="left1 left3">Home</a>
            </div>

            <!-- -----------------------Right Section----------------------- -->
            <div class="right">
                <div class="aright">
                    <!-- Replace this placeholder with the content of AdminRightOne -->
                    @include('SubPage.AdminProfile.adminProfileOne')
                </div>
                <div class="bright">
                    <!-- Replace this placeholder with the content of AdminRightTwo -->
                    @include('SubPage.AdminProfile.adminProfileTwo')
                </div>
                <div class="cright">
                    <!-- Replace this placeholder with the content of AdminRightThree -->
                    @include('SubPage.AdminProfile.adminProfileThree')
                </div>
                <div class="dright">
                    <!-- Replace this placeholder with the content of AdminRightFour -->
                    @include('SubPage.AdminProfile.adminProfileFour')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/adminProfile.js') }}"></script>
</body>

</html>
