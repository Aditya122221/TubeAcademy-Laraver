<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}

$homeRouting = '';
if ($_SESSION['role'] == 'admin') {
    $homeRouting = '/admin/home';
}
if ($_SESSION['role'] == 'Teacher') {
    $homeRouting = '/teacher/home';
}
if ($_SESSION['role'] == 'Student') {
    $homeRouting = '/student/home';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/askai.css')}}"> --}}
    <title>TubeAcademy | AskAI</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kelly+Slab&family=Oxanium:wght@200..800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap');

    body {
        margin: 0;
        padding: 0;
        user-select: none;
    }

    .AboutMain {
        background-color: #333;
        min-height: 100vh;
    }

    .logo {
        height: 2cm;
        width: 2cm;
        margin-left: 5%;
        margin-top: 2%;
    }

    .a {
        display: flex;
        justify-content: space-around;
    }

    .b {
        margin-top: 2cm;
        background: linear-gradient(16deg, #d96570, #9b72cb, #9b72cb, #d96570);
        background-clip: text;
        color: transparent;
    }

    .t {
        font-size: 5rem;
        font-family: "Kelly Slab";
    }

    .c {
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1cm;
        font-family: 'Fredoka';
    }

    .d {
        text-decoration: none;
        color: white;
        padding: 15px;
        background-color: #cf9138;
        border-radius: 5px;
        font-family: 'Fredoka';
    }
</style>

<body>
    <div class="AboutMain">
        <a href="{{ $homeRouting }}">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </a>
        <div class="a">
            <div class="b">
                <h2 class="t">Coming Soon...</h2>
                <p class="c">We are working on it. Try our rest of the features with ease</p>
                <a class="d" href="{{ $homeRouting }}">Back to Home</a>
            </div>
            <img src="{{ asset('Images/DismantledBot.png') }}" class="dis" />
        </div>
    </div>
</body>

</html>
