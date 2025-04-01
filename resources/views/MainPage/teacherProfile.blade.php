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
    {{-- <link rel="stylesheet" href="{{ asset('css/teacherProfile.css') }}"> --}}
    <title>TubeAcademy | Profile</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playwrite+CO+Guides&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        margin: 0;
        padding: 0;
        user-select: none;
        overflow: hidden;
    }

    .mainProfilePage {
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .top {
        display: flex;
        background-color: #FBFBFB;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .adminProfile {
        display: flex;
    }

    .left {
        width: 25%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        padding: 5px;
        background-color: white;
    }

    .logo {
        width: 2cm;
        height: 2cm;
    }

    .left1 {
        display: flex;
        margin-top: 20px;
        padding: 15px;
        font-family: "Roboto Condensed";
        font-size: 1.2rem;
        cursor: pointer;
        color: black;
        align-items: center;
    }

    .icon {
        font-size: 1rem;
    }

    .ttt {
        margin-left: 15px;
    }

    .left2 {
        text-decoration: none;

        &:hover {
            border-radius: 10px;
            color: #006400;
        }
    }

    .left3 {
        border-radius: 10px;
        background-color: #006400;
        color: white;
        text-decoration: none;
        text-align: center;
        font-size: 1.125rem;
        width: 30%;
        height: 100%;
    }

    .formTitle {
        color: #000000;
        font-size: 1rem;
        font-weight: 500;
    }

    .formParagraph {
        font-size: 0.9375rem;
        color: rgb(105, 105, 105);
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

    .option {
        background-color: #006400;
        color: white;
    }

    .button {
        margin-top: 5px;
        cursor: pointer;
        border-radius: 5px;
        color: white;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 100%;
        height: 50px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;

        &:hover {
            color: rgb(247, 247, 247);
            background-color: #ffbe0b;
            border-color: #ffbe0b;
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 20px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    .errrooor {
        color: red;
        font-size: 1rem;
    }

    .succ {
        display: none;
        border-radius: 0.375rem;
        background-color: #d1e7dd;
        color: #0a3622;
        font-family: sans-serif;
        font-size: 1.2rem;
        padding: 10px 5px;
        border: 1px solid #a3cfbb;
        margin-top: 5px;
    }

    .unsucc {
        display: none;
        border-radius: 0.375rem;
        background-color: #f8d7da;
        color: #58151c;
        font-family: sans-serif;
        font-size: 1.2rem;
        padding: 10px 5px;
        border: 1px solid #f1aeb5;
        margin-top: 5px;
    }
</style>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- "selectedOne" class is statically added for demonstration; adjust as needed -->
                <div class="left1 selectedOne l1" onclick="showAccount()">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="showUpload()">
                    <i class="fa-solid fa-file-arrow-up icon"></i>
                    <span class="ttt">Upload Video</span>
                </div>
                <a href="/logout" class="left1 left2">
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                </a>
                <a href="/teacher/home" class="left1 left3">Home</a>
            </div>
            <div class="right">
                <div class="aright">
                    <!-- Replace this with the content of TeacherRightOne -->
                    @include('SubPage.TeacherProfile.teacherProfileOne')
                </div>
                <div class="bright">
                    <!-- Replace this with the content of TeacherRightTwo -->
                    @include('SubPage.TeacherProfile.teacherProfileTwo')
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/teacherProfile.js') }}"></script> --}}

    <script>
        var l1 = document.querySelector(".l1")
        var l2 = document.querySelector(".l2")
        var aright = document.querySelector(".aright")
        var bright = document.querySelector(".bright")

        function showAccount() {
            l1.classList.add("selectedOne")
            l2.classList.remove("selectedOne")

            aright.style.display = "flex"
            bright.style.display = "none"
        }

        function showUpload() {
            l1.classList.remove("selectedOne")
            l2.classList.add("selectedOne")

            aright.style.display = "none"
            bright.style.display = "flex"
        }
    </script>
</body>

</html>
