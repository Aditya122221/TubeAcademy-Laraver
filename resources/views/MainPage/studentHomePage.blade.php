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

    if ($video['classIn'] == 'IX' && $kN < 4) {
        $nineVideos[] = $video;
        $kN += 1;
    } elseif ($video['classIn'] == 'X' && $kT < 4) {
        $tenVideos[] = $video;
        $kT += 1;
    } elseif ($video['classIn'] == 'XI' && $kE < 4) {
        $elevenVideos[] = $video;
        $kE += 1;
    } elseif ($video['classIn'] == 'XII' && $kTw < 4) {
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
    <link rel="stylesheet" href="{{asset("css/studentHome.css")}}">
    <link rel="stylesheet" href="{{asset("css/cardDesign.css")}}">
    <title>TubeAcademy</title>
</head>

<body>
    @include('navbar')
    <div class="MainHome">
        <div class="container">
            <a href="#" class="classin">Class IX</a>
            <a href="#" class="classin">Class X</a>
            <a href="#" class="classin">Class XI</a>
            <a href="#" class="classin">Class XII</a>
        </div>

        <div class="HomeContainer">
            <div class="videosClassNine">
                <div class="MainClassNine">
                    @forelse ($nineVideos as $video)
                        <div class="cards">
                            <img class="thumbnail" src="{{asset('storage/'.$video->thumbnail)}}" alt="Thumbnail" >
                            <h3 class="title">{{$video->title}}</h3>
                            <div class="details">
                                <div class="subject">{{$video->subjectName}}</div>
                                <div class="classIn">{{$video->classIn}}</div>
                            </div>
                            <div class="teacherName">{{$video->teacherName}}</div>
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
                                <img class="thumbnail" src={{$video["thumbnail"]}} alt="Thumbnail" />
                                <h3 class="title">{{$video->title}}</h3>
                                <div class="details">
                                    <div class="subject">{{$video->subjectName}}</div>
                                    <div class="classIn">{{$video->forClass}}</div>
                                </div>
                                <div class="teacherName">{{$video->teacherName}}</div>
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
                                <img class="thumbnail" src={{$video["thumbnail"]}} alt="Thumbnail" />
                                <h3 class="title">{{$video->title}}</h3>
                                <div class="details">
                                    <div class="subject">{{$video->subjectName}}</div>
                                    <div class="classIn">{{$video->forClass}}</div>
                                </div>
                                <div class="teacherName">{{$video->teacherName}}</div>
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
                                <img class="thumbnail" src={{$video["thumbnail"]}} alt="Thumbnail" />
                                <h3 class="title">{{$video->title}}</h3>
                                <div class="details">
                                    <div class="subject">{{$video->subjectName}}</div>
                                    <div class="classIn">{{$video->forClass}}</div>
                                </div>
                                <div class="teacherName">{{$video->teacherName}}</div>
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
