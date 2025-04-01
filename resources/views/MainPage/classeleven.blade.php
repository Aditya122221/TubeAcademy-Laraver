<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}
if ($_SESSION['role'] != 'Student') {
    header('Location: /');
    exit();
}

$uniqueTeachers = collect($elevenVideos)->pluck('teacherName')->unique();
$uniqueSubjects = collect($elevenVideos)->pluck('subjectName')->unique();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/classnine.css') }}">
    <title>TubeAcademy</title>
</head>

<body>
    <div class="Block">
        @include('navbar')
        @include('subheading')

        <div class="containerr">
            <div class="filterOption">
                <div class="titleAndFilteration">
                    <div class="title">Filter By Subject</div>
                    <div class="filterButton">
                        @foreach ($uniqueSubjects as $sub)
                        <button class="filt" data-subject="{{ $sub }}">{{ $sub }}</button>
                        @endforeach
                        <button id="resetFilter" class="filt">All</button>
                    </div>
                </div>

                <div class="titleAndFilteration">
                    <div class="title">Filter By Teacher</div>
                    <div class="filterButton">
                        @foreach ($uniqueTeachers as $teacher)
                        <button class="filt" data-teacher="{{ $teacher }}">{{ $teacher }}</button>
                        @endforeach
                        <button id="resetFilterr" class="filt">All</button>
                    </div>
                </div>
            </div>

            <div class="videosbyfilter">
                @forelse ($elevenVideos as $video)
                <div class="cards" data-subject="{{ $video->subjectName }}" data-teacher="{{ $video->teacherName }}">
                    <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail" />
                    <h3 class="title">{{ $video->title }}</h3>
                    <div class="details">
                        <div class="subject">{{ $video->subjectName }}</div>
                        <div class="classIn">{{ $video->classIn }}</div>
                    </div>
                    <div class="teacherName">{{ $video->teacherName }}</div>
                    <button class="button">Watch Now</button>
                </div>
                @empty
                <div>No video found</div>
                @endforelse
            </div>
        </div>
    </div>
</body>
<script src="{{asset('js/videoFilter.js')}}"></script>

</html>
