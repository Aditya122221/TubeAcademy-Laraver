<?php
if(!isset($_SESSION["Reg_ID"])){
    header('Location: /');
    exit;
}

if($_SESSION["role"] != "Teacher"){
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
    <link rel="stylesheet" href="{{asset("css/cardDesign.css")}}">
    <title>TubeAcademy</title>
</head>

<body>
    @include('navbar')
    <div class="TeacherHomePagee">
        <div class="TeacherHomePage">
            @foreach ($videos as $video)
            <div class="cards THP">
                <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail)}}" alt="Thumbnail">
                <h3 class="title">{{ $video["title"] }}</h3>
                <div class="details">
                    <div class="subject">{{ $video["subjectName"] }}</div>
                    <div class="classIn">{{ $video["classIn"] }}</div>
                </div>
                <div class="actionButton">

                    <button onclick="window.location.href='{{route('editing', ['video_id' => $video['Video_ID']])}}'" class="uiBtnEdit">Edit</button>

                    <button class="uiBtnDelete">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
