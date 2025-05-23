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
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
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
        background-color: #333333;
        color: white;
        text-decoration: none;
    }

    .selectedOne {
        color: white;
        background-color: #26A69A;
        border-right: 10px solid #333333;
    }

    .right {
        width: 85%;
    }

    .aright {
        display: flex;
        flex-direction: column;
    }

    /* -----------------------------------Right One Styling--------------------------- */

    .rightone {
        display: flex;
        border-radius: 10px;
        padding-left: 2%;
        padding-top: 5%;
        padding-bottom: 5%;
        min-height: 100vh;
        width: 100%;
    }

    .card {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        border-radius: 30px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        width: 95%;
        height: 480px;
    }

    .leftContainer {
        background-color: #333333;
        width: 35%;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 430px;
        padding: 10px;
        border-radius: 20px;
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .profile {
        display: flex;
        border-radius: 50%;
        height: 65%;
        width: 65%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .gradienttext {
        background-image: linear-gradient(to right, #ee00ff 0%, #fbff00 100%);
        color: transparent;
        background-clip: text;
        text-align: center;
        font-family: "Arvo", serif;
    }

    .rightContainer {
        background: #333333;
        flex: 1;
        max-width: 70%;
        height: 430px;
        padding: 10px;
        margin: 20px;
        border-radius: 30px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .table {
        margin-top: 2cm;
        background-color: transparent;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: none;
    }

    .td {
        padding: 10px;
        border: none;
        border-radius: 20px;
        color: white;
        font-family: "Kanit", serif;
        font-size: .9rem;
    }

    .td:first-child {
        font-weight: bold;
    }

    .rightOneButton {
        margin-top: 5px;
        cursor: pointer;
        border-radius: 5px;
        color: white;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 60%;
        height: 50px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;

        &:hover {
            color: rgb(247, 247, 247);
            background-color: #ff006e;
            border-color: #ff006e;
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 18px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    /* ------------------------------Right One Styling End---------------------------- */

    /* ------------------------------Right Two Styling-------------------------------- */

    .rigth2 {
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        padding-left: 2%;
        padding-top: 5%;
        padding-bottom: 5%;
        min-height: 100vh;
        width: 100%;
    }

    .account {
        display: flex;
        flex-direction: column;
        background: #333333;
        align-items: center;
        border-radius: 30px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        width: 85%;
        height: 560px;
        justify-content: center;
    }

    .form {
        display: flex;
        flex-direction: column;
        width: 50%;
    }

    .input {
        border: none;
        outline: none;
        border-radius: 15px;
        padding: 1em;
    }

    .input:focus {
        background-color: white;
    }

    .select {
        border: 2px solid #ccc;
        border-radius: 5px;
        outline: none;
        padding: 10px;
        margin: 5px;
        background-color: transparent;
        color: white;

        &:focus {
            border: 2px solid black;
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
        background-color: #333333;
        color: white;
    }

    .button {
        margin-top: 25px;
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

    h1 {
        color: white;
    }

    .cright {
        width: 100%;
    }

    .rightFour {
        width: 100%;
    }

    .tetd {
        display: flex;
        align-items: center;
        font-family: "Roboto Condensed", serif;
        font-optical-sizing: auto;
        font-weight: bold;
        font-style: normal;
        font-size: 2.5rem;
        padding: 25px;
    }

    .Ttdd {
        border-radius: 25px;
        background-color: #333333;
        padding: 50px;
    }

    .ttable {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Roboto', Arial, sans-serif;
        background-color: #f9f9f9;
    }

    .TableHead {
        background-color: #e0e0e0;
        font-size: 25px;
        text-align: center;
        color: #333333;
        font-weight: bold;
    }

    .ttd {
        font-family: "Roboto Condensed", serif;
        font-optical-sizing: auto;
        font-weight: bold;
        font-style: normal;
        font-size: 1rem;
        padding: 25px;
        border: 1px solid #cccccc;
        padding: 10px;
        text-align: left;
    }

    .resolved {
        background-color: #0eeb803f;
    }

    .pending {
        background-color: #eaea085a;
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

    /* -----------------------------Right Two Styling End----------------------------- */
</style>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- "selectedOne" class is statically added for demonstration; adjust as needed -->
                <div class="left1 selectedOne l1" onclick="showSection('l1')">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="showSection('l2')">
                    <i class="fa-solid fa-file-arrow-up icon"></i>
                    <span class="ttt">Upload Video</span>
                </div>

                <div class="left1 l3" onclick="showSection('l3')">
                    <i class="fa-light fa-clipboard-question"></i>
                    <span class="ttt">Queries</span>
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
                <div class="cright">
                    @include('SubPage.TeacherProfile.teacherProfileThree')
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/teacherProfile.js') }}"></script> --}}

    <script>
        var sections = {
            l1: document.querySelector(".aright"),
            l2: document.querySelector(".bright"),
            l3: document.querySelector(".cright"),
        }

        function showSection(selected) {
            Object.keys(sections).forEach((key) => {
                document.querySelector("." + key).classList.toggle("selectedOne", key == selected);
                sections[key].style.display = key == selected ? "flex" : "none";
            })
        }
    </script>
</body>

</html>
