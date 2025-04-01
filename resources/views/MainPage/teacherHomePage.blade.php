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
    {{-- <link rel="stylesheet" href="{{asset("css/cardDesign.css")}}"> --}}
    <title>TubeAcademy</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&family=Sofadi+One&display=swap');

    body {
        padding: 0;
        margin: 0;
        user-select: none;
        overflow-x: hidden;
    }

    .MainClassNine {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        width: 100%;
    }

    .cards {
        display: flex;
        flex-direction: column;
        width: 28%;
        height: 100%;
    }

    .cards:hover .thumbnail {
        border-radius: 0;
    }

    .thumbnail {
        width: 100%;
        height: 80%;
        border-radius: 10px;
    }

    .title {
        font-family: 'Rubik';
    }

    .details {
        display: flex;
        justify-content: space-between;
        font-family: 'Exo 2';
        color: #606060;
    }

    .teacherName {
        font-family: 'Exo 2';
        color: #606060;
    }

    .button {
        cursor: pointer;
        margin-top: 15px;
        color: white;
        border-style: solid;
        background-color: #0e0e1a;
        border: none;
        width: 100%;
        height: 60px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-radius: 0.4rem;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;

        &:hover {
            color: rgb(247, 247, 247);
            background: linear-gradient(270deg, #021d4eae 0%, #1fd7e8df 60%);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 20px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    /* -----------------------------Teacher Home Page Designing----------------------- */

    .h2 {
        padding: 25px;
        border: 2px solid black;
    }

    .TeacherHomePage {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .THP {
        margin-top: 1cm;
    }

    .actionButton {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }

    .uiBtnEdit {
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 48%;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;
    }

    .uiBtnEdit:hover {
        color: rgb(247, 247, 247);
        background-color: #09f3ef;
        border-color: #09f3ef;
        text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
        font-size: 20px;
        letter-spacing: 3px;
    }

    .uiBtnEdit:active {
        letter-spacing: 0px;
    }

    .uiBtnDelete {
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 48%;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;
    }

    .uiBtnDelete:hover {
        color: rgb(247, 247, 247);
        background-color: rgb(202, 25, 25);
        border-color: rgb(202, 25, 25);
        text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
        font-size: 20px;
        letter-spacing: 3px;
    }

    .uiBtnDelete:active {
        letter-spacing: 0px;
    }
</style>

<body>
    @include('navbar')
    <div class="TeacherHomePagee">
        <div class="TeacherHomePage">
            @foreach ($videos as $video)
                <div class="cards THP">
                    <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail">
                    <h3 class="title">{{ $video['title'] }}</h3>
                    <div class="details">
                        <div class="subject">{{ $video['subjectName'] }}</div>
                        <div class="classIn">{{ $video['classIn'] }}</div>
                    </div>
                    <div class="actionButton">

                        <button
                            onclick="window.location.href='{{ route('editing', ['video_id' => $video['Video_ID']]) }}'"
                            class="uiBtnEdit">Edit</button>

                        <button
                            onclick="window.location.href='{{ route('deleting', ['video_id' => $video['Video_ID']]) }}'"
                            class="uiBtnDelete">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
