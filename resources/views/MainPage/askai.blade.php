<?php
session_start();
if(!isset($_SESSION["role"])){
    header("Location: /");
    exit;
}

$homeRouting = "";
if($_SESSION["role"] == 'admin'){
    $homeRouting = '/admin/home';
} if($_SESSION["role"] == 'Teacher'){
    $homeRouting = '/teacher/home';
} if($_SESSION["role"] == 'Student'){
    $homeRouting = '/student/home';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/askai.css')}}">
    <title>TubeAcademy | AskAI</title>
</head>

<body>
    <div class="AboutMain">
        <a href="{{$homeRouting}}">
            <img src="{{asset('Images/Logo.png')}}" alt="Logo" class="logo" />
        </a>
        <div class="a">
            <div class="b">
                <h2 class="t">Coming Soon...</h2>
                <p class="c">We are working on it. Try our rest of the features with ease</p>
                <a class="d" href="{{$homeRouting}}">Back to Home</a>
            </div>
            <img src="{{asset('Images/DismantledBot.png')}}" class="dis" />
        </div>
    </div>
</body>

</html>
