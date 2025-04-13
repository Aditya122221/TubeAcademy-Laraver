<?php session_start();
if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}
if ($_SESSION['role'] != 'Student') {
    header('Location: /');
    exit();
}


$kN = 1;
$kT = 1;
$kE = 1;
$kTw = 1;
$nineVideos = [];
$tenVideos = [];
$elevenVideos = [];
$twelveVideos = [];

$videos = $videos->reverse();

foreach ($videos as $video) {
    if ($kN >= 4 && $kT >= 4 && $kE >= 4 && $kTw >= 4) {
        break;
    }

    if ($video['class'] == 'IX' && $kN < 4) {
        $nineVideos[] = $video;
        $kN += 1;
    } elseif ($video['class'] == 'X' && $kT < 4) {
        $tenVideos[] = $video;
        $kT += 1;
    } elseif ($video['class'] == 'XI' && $kE < 4) {
        $elevenVideos[] = $video;
        $kE += 1;
    } elseif ($video['class'] == 'XII' && $kTw < 4) {
        $twelveVideos[] = $video;
        $kTw += 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    {{-- <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}"> --}}
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
        height: 100px;
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

    @import url('https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&family=Sofadi+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap');

    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .MainHome {
        background-color: white;
    }

    .HomeContainer {
        position: relative;
        z-index: 1;
    }

    .videosClassNine {
        display: flex;
        padding: 15px;
        padding-left: 25px;
        margin-top: 1cm;
        color: black;
        justify-content: space-between;
    }

    .ClassNineVideos {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        width: 100%;
        animation: fade-in linear;
        animation-timeline: view();
        animation-range-end: 28%;
    }

    @keyframes fade-in {
        from {
            scale: .5;
        }

        to {
            scale: 1;
        }
    }

    .ClassNine {
        background-color: #ffffff1a;
        padding: 15px;
        user-select: none;
        border-radius: 10px;
        backdrop-filter: blur(50px);
        border: 2px solid #7ef00533;
        width: 22%;
        text-wrap: wrap;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: .3s;

        &:hover {
            transform: scale(1.05);
        }
    }

    .imgSrc {
        width: 94%;
        border: 11px solid black;
    }

    /* .button {
        cursor: pointer;
        border-radius: 5px;
        padding: 4px 10px;
        font-family: "Exo 2";
        font-size: 18px;
        margin-top: 10px;
        background-color: transparent;

        &:hover {
            background-color: black;
            color: white;
        }
    } */

    .videoName {
        font-family: 'Rubik';
        font-weight: bold;
    }

    .subjectClass {
        display: flex;
        font-family: "Chakra Petch", sans-serif;
        justify-content: space-between;
        color: #d5d5d5;
        font-weight: bold;
    }

    .ChannelName {
        font-family: "Chakra Petch", sans-serif;
        color: #d5d5d5;
        font-weight: bold;
    }

    /* ------------------------Responsive------------------------------ */

    @media (max-width: 1030px) {
        body {
            overflow-x: hidden;
        }
    }

    @media (max-width: 701px) {
        .ClassNineVideos {
            flex-direction: column;
            gap: 0.5cm;
        }

        .ClassNine {
            width: 80%;
            margin: auto;
        }
    }
</style>

<body>
    @include('navbar')
    <div class="MainHome">
        @include('subheading')
        <div class="HomeContainer">
            <div class="videosClassNine">
                <div class="MainClassNine">
                    @forelse ($nineVideos as $video)
                        <div class="cards">
                            <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail">
                            <h3 class="title">{{ $video->title }}</h3>
                            <div class="details">
                                <div class="subject">{{ $video->subjectName }}</div>
                                <div class="classIn">{{ $video->class }}</div>
                            </div>
                            <div class="teacherName">{{ $video->teacherName }}</div>
                            <button class="button">Watch Now</button>
                        </div>
                    @empty
                        <h1>No data found</h1>
                    @endforelse
                </div>
            </div>
            <div class="videosClassNine">
                <div class="ClassNineVideos">
                    <div class="MainClassNine">
                        @forelse ($tenVideos as $video)
                            <div class="cards">
                                <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}"
                                    alt="Thumbnail" />
                                <h3 class="title">{{ $video->title }}</h3>
                                <div class="details">
                                    <div class="subject">{{ $video->subjectName }}</div>
                                    <div class="classIn">{{ $video->class }}</div>
                                </div>
                                <div class="teacherName">{{ $video->teacherName }}</div>
                                <button class="button">Watch Now</button>
                            </div>
                        @empty
                            <h1>No data found</h1>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="videosClassNine">
                <div class="ClassNineVideos">
                    <div class="MainClassNine">
                        @forelse ($elevenVideos as $video)
                            <div class="cards">
                                <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}"
                                    alt="Thumbnail" />
                                <h3 class="title">{{ $video->title }}</h3>
                                <div class="details">
                                    <div class="subject">{{ $video->subjectName }}</div>
                                    <div class="classIn">{{ $video->class }}</div>
                                </div>
                                <div class="teacherName">{{ $video->teacherName }}</div>
                                <button class="button">Watch Now</button>
                            </div>
                        @empty
                            <h1>No data found</h1>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="videosClassNine">
                <div class="ClassNineVideos">
                    <div class="MainClassNine">
                        @forelse ($twelveVideos as $video)
                            <div class="cards">
                                <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}"
                                    alt="Thumbnail" />
                                <h3 class="title">{{ $video->title }}</h3>
                                <div class="details">
                                    <div class="subject">{{ $video->subjectName }}</div>
                                    <div class="classIn">{{ $video->class }}</div>
                                </div>
                                <div class="teacherName">{{ $video->teacherName }}</div>
                                <button class="button">Watch Now</button>
                            </div>
                        @empty
                            <h1>No data found</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
