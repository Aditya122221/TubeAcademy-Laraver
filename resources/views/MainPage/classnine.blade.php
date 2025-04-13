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

$uniqueTeachers = collect($nineVideos)->pluck('teacherName')->unique();
$uniqueSubjects = collect($nineVideos)->pluck('subjectName')->unique();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/classnine.css') }}"> --}}
    <title>TubeAcademy</title>
</head>
<style>
    body {
        overflow-x: hidden;
        padding: 0;
        margin: 0;
        user-select: none;
    }

    @import url('https://fonts.googleapis.com/css2?family=Anton+SC&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Anton+SC&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

    .containerr {
        display: flex;
        padding: 10px;
        user-select: none;
    }

    .cards {
        display: flex;
        flex-direction: column;
        margin:15px;
        width: 28%;
        height: 10cm;
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

    .filterOption {
        width: 25%;
        display: flex;
        flex-direction: column;
        padding: 15px;
    }

    .filter_subject {
        padding: 5px;
        font-size: 25px;
        outline: none;
        border-radius: 5px;
        background-color: transparent;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .videosbyfilter {
        width: 70%;
        display: flex;
        flex-wrap: wrap;
        padding: 15px;
    }

    @media (max-width: 930px) {
        .ClassNineee {
            width: 100%;
        }
    }

    @media (max-width: 600px) {
        .contaner {
            flex-direction: column;
        }

        .filterOption {
            width: 90%;
            display: flex;
            flex-direction: row;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap');

    .title {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .titleAndFilteration {
        padding: 15px;
        border-radius: 5px;
        margin-top: 15px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .filterButton {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 5px;
    }

    .filt {
        font-family: "SUSE";
        margin-top: 15px;
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 100%;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;

        &:hover {
            color: rgb(247, 247, 247);
            background: #006400;
            border-color: #006400;
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 20px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    .selected {
        background-color: #007bff;
        border: #007bff;
        color: white;
    }
</style>

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
                @forelse ($nineVideos as $video)
                    <div class="cards" data-subject="{{ $video->subjectName }}"
                        data-teacher="{{ $video->teacherName }}">
                        <img class="thumbnail" src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail" />
                        <h3 class="title">{{ $video->title }}</h3>
                        <div class="details">
                            <div class="subject">{{ $video->subjectName }}</div>
                            <div class="classIn">{{ $video->class }}</div>
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
{{-- <script src="{{ asset('js/videoFilter.js') }}"></script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let selectedSubject = "";
        let selectedTeacher = "";

        function filterVideos() {
            const videos = document.querySelectorAll(".cards");

            videos.forEach(video => {
                let videoSubject = video.getAttribute("data-subject");
                let videoTeacher = video.getAttribute("data-teacher");

                let subjectMatch = selectedSubject === "" || videoSubject === selectedSubject;
                let teacherMatch = selectedTeacher === "" || videoTeacher === selectedTeacher;

                if (subjectMatch && teacherMatch) {
                    video.style.display = "flex";
                } else {
                    video.style.display = "none";
                }
            });
        }

        function handleFilterClick(event, filterType) {
            let buttons = document.querySelectorAll(`.filt[data-${filterType}]`);
            buttons.forEach(btn => btn.classList.remove("selected"));

            if (event.target.getAttribute(`data-${filterType}`)) {
                event.target.classList.add("selected");
            }

            if (filterType === "subject") {
                selectedSubject = event.target.getAttribute("data-subject") || "";
            } else if (filterType === "teacher") {
                selectedTeacher = event.target.getAttribute("data-teacher") || "";
            }

            filterVideos();
        }

        document.querySelectorAll(".filt[data-subject]").forEach(button => {
            button.addEventListener("click", function(event) {
                handleFilterClick(event, "subject");
            });
        });

        document.querySelectorAll(".filt[data-teacher]").forEach(button => {
            button.addEventListener("click", function(event) {
                handleFilterClick(event, "teacher");
            });
        });

        document.getElementById("resetFilter").addEventListener("click", function() {
            selectedSubject = "";
            selectedTeacher = "";

            document.querySelectorAll(".filt").forEach(btn => btn.classList.remove("selected"));
            filterVideos();
        });
        document.getElementById("resetFilterr").addEventListener("click", function() {
            selectedSubject = "";
            selectedTeacher = "";

            document.querySelectorAll(".filt").forEach(btn => btn.classList.remove("selected"));
            filterVideos();
        });
    });
</script>

</html>
