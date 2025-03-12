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
    <link rel="stylesheet" href="{{ asset('css/VideoEdit.css') }}">
    <title>TubeAcademy | Video Edit</title>
</head>

<body>
    <div class="main">

        <form class="form" method="post" action="{{ route('updating', ['video_id' => $video['Video_ID']]) }}" enctype="multipart/form-data">
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
                $selectedSubject = $video["subjectName"]
            @endphp
            <select required name="SubjectName" class="select">
                <option class="option" value="">--- Select Subject ---</option>
                <option class="option" value="Mathematics" {{ $selectedSubject == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                <option class="option" value="Physics" {{ $selectedSubject == 'Physics' ? 'selected' : '' }}>Physics</option>
                <option class="option" value="Chemistry" {{ $selectedSubject == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                <option class="option" value="Biology" {{ $selectedSubject == 'Biology' ? 'selected' : '' }}>Biology</option>
            </select>

            @if ($errors->has('classIn'))
                <span class="errrooor">{{ $errors->first('classIn') }}</span>
            @endif
            @php
                $selectedClass = $video["classIn"]
            @endphp
            <select required name="classIn" class="select">
                <option class="option" value="">--- Select Class ---</option>
                <option class="option" value="IX" {{$selectedClass == "IX" ? "selected" : ""}}>IX</option>
                <option class="option" value="X" {{$selectedClass == "X" ? "selected" : ""}}>X</option>
                <option class="option" value="XI" {{$selectedClass == "XI" ? "selected" : ""}}>XI</option>
                <option class="option" value="XII" {{$selectedClass == "XII" ? "selected" : ""}}>XII</option>
            </select>
            <div class="uploader">
                @error('thumbnail')
                    <span class="errrooor">{{ $message }}</span>
                @enderror
                <div class="formm">
                    <span class="formTitle">Upload Thumbnail</span>
                    <label for="thumbnail" class="dropContainer">
                        <input id="thumbnail" type="file" class="fileInput" name="thumbnail" >
                    </label>
                </div>

                @error('video')
                    <span class="errrooor">{{ $message }}</span>
                @enderror
                <div class="formm">
                    <span class="formTitle">Upload Video</span>
                    <label for="video" class="dropContainer">
                        <input id="video" type="file" class="fileInput" name="video" >
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
