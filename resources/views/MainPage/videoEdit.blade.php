<?php
session_start();
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
    {{-- <link rel="stylesheet" href="{{ asset('css/VideoEdit.css') }}"> --}}
    <title>TubeAcademy | Video Edit</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap');

    body {
        margin: 0;
        padding: 0;
        user-select: none;
        overflow: hidden;
    }

    .main {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form {
        background-color: white;
        border-radius: 15px;
        padding: 100px;
        width: 40%;
        display: flex;
        flex-direction: column;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }

    .input {
        padding: 10px;
        border: 2px solid #0000003d;
        border-radius: 10px;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
        width: 67%;

        &:focus {
            border: 2px solid #b0c9cd;
            outline: none;
        }
    }

    .select {
        padding: 10px;
        border: 2px solid #0000003d;
        border-radius: 10px;
        margin-top: 15px;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
        width: 70%;

        &:focus {
            border: 2px solid #b0c9cd;
            outline: none;
        }
    }

    .uploader {
        display: flex;
        gap: 50px;
        margin: 15px;
    }

    .formm {
        background-color: #fff;
        box-shadow: 0 10px 60px rgb(218, 229, 255);
        border: 1px solid rgb(159, 159, 160);
        border-radius: 20px;
        padding: 10px;
        text-align: center;
        font-size: 1.125rem;
        width: 30%;
        height: 100%;
    }

    .dropContainer {
        background-color: #fff;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
        margin-top: 10px;
        border-radius: 10px;
        border: 2px dashed rgb(171, 202, 255);
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
        width: 80%;
    }

    .dropContainer:hover {
        background: rgba(0, 140, 255, 0.164);
        border-color: rgba(17, 17, 17, 0.616);
    }

    .dropContainer:hover .drop-title {
        color: #222;
    }

    .fileInput {
        width: 100%;
        height: 100%;
        color: #444;
        padding: 2px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid rgba(8, 8, 8, 0.288);
    }

    .fileInput::file-selector-button {
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    .fileInput::file-selector-button:hover {
        background: #0d45a5;
    }

    .uiBtnUpdate {
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 75%;
        margin-top: 15px;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;
    }

    .uiBtnUpdate:hover {
        color: rgb(247, 247, 247);
        background-color: #19ca1c;
        border-color: #19ca1c;
        text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
        font-size: 20px;
        letter-spacing: 3px;
    }

    .uiBtnUpdate:active {
        letter-spacing: 0px;
    }

    .uiBtnCancel {
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 75%;
        margin-top: 15px;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;
        text-decoration: none;
        text-align: center;
    }

    .uiBtnCancel:hover {
        color: rgb(247, 247, 247);
        background-color: rgb(202, 25, 25);
        border-color: rgb(202, 25, 25);
        text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
        font-size: 20px;
        letter-spacing: 3px;
    }

    .uiBtnCancel:active {
        letter-spacing: 0px;
    }

    .errrr {
        color: red;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
    }

    .errrooor {
        color: red;
        font-family: "Josefin Sans", serif;
        font-size: 1.3rem;
        letter-spacing: 2px;
    }
</style>

<body>
    <div class="main">

        <form class="form" method="post" action="{{ route('updating', ['video_id' => $video['Video_ID']]) }}"
            enctype="multipart/form-data">
            @csrf

            @if ($errors->has('VTitle'))
                <span class="errrooor">{{ $errors->first('VTitle') }}</span>
            @endif

            <input class="input" type="text" name="VTitle" placeholder="Enter the title for the video"
                value="{{ $video['title'] }}" required>

            @if ($errors->has('SubjectName'))
                <span class="errrooor">{{ $errors->first('SubjectName') }}</span>
            @endif

            @php
                $selectedSubject = $video['subjectName'];
            @endphp
            <select required name="SubjectName" class="select">
                <option class="option" value="">--- Select Subject ---</option>
                <option class="option" value="Mathematics" {{ $selectedSubject == 'Mathematics' ? 'selected' : '' }}>
                    Mathematics</option>
                <option class="option" value="Physics" {{ $selectedSubject == 'Physics' ? 'selected' : '' }}>Physics
                </option>
                <option class="option" value="Chemistry" {{ $selectedSubject == 'Chemistry' ? 'selected' : '' }}>
                    Chemistry</option>
                <option class="option" value="Biology" {{ $selectedSubject == 'Biology' ? 'selected' : '' }}>Biology
                </option>
            </select>

            @if ($errors->has('class'))
                <span class="errrooor">{{ $errors->first('class') }}</span>
            @endif
            @php
                $selectedClass = $video['class'];
            @endphp
            <select required name="class" class="select">
                <option class="option" value="">--- Select Class ---</option>
                <option class="option" value="IX" {{ $selectedClass == 'IX' ? 'selected' : '' }}>IX</option>
                <option class="option" value="X" {{ $selectedClass == 'X' ? 'selected' : '' }}>X</option>
                <option class="option" value="XI" {{ $selectedClass == 'XI' ? 'selected' : '' }}>XI</option>
                <option class="option" value="XII" {{ $selectedClass == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
            <div class="uploader">
                @error('thumbnail')
                    <span class="errrooor">{{ $message }}</span>
                @enderror
                <div class="formm">
                    <span class="formTitle">Upload Thumbnail</span>
                    <label for="thumbnail" class="dropContainer">
                        <input id="thumbnail" type="file" class="fileInput" name="thumbnail">
                    </label>
                </div>

                @error('video')
                    <span class="errrooor">{{ $message }}</span>
                @enderror
                <div class="formm">
                    <span class="formTitle">Upload Video</span>
                    <label for="video" class="dropContainer">
                        <input id="video" type="file" class="fileInput" name="video">
                    </label>
                </div>
            </div>

            <button class="uiBtnUpdate" type="submit">Update Data</button>

            <a href="/teacher/home" class="uiBtnCancel" type="button">Cancel</a>
            @if (session('error'))
                <span class="errrooor">{{ session('error') }}</span>
            @endif

        </form>
    </div>
</body>

</html>
