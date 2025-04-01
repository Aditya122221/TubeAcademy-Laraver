<?php
if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}

if ($_SESSION['role'] != 'Student') {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{asset('css/studentProfile.css')}}"> --}}
    <title>TubeAcademy | Profile</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap');
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
        min-width: 100vh;
        min-height: 100vh;
        overflow: hidden;
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
            color: #0082e6;
        }
    }

    .left3 {
        border-radius: 10px;
        background-color: #0082e6;
        color: white;
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
            color: black;
            background-color: #ccff33;
            border-color: #ccff33;
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 18px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    .bright {
        display: none;
    }

    .brightOne {
        background-color: #0082e349;
        min-height: 100vh;
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
        color: white;
    }

    .Ttdd {
        border-radius: 25px;
        background-color: #0082e6;
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

    .hidden {
        display: none;
    }

    .resolved {
        background-color: #0eeb803f;
    }

    .pending {
        background-color: #eaea085a;
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

    .brightTwo {
        margin-top: 25px;
        border: 2px solid black;
    }
</style>

<body>
    <div class="mainProfilePage">
        <div class="top">
            <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
        </div>
        <div class="adminProfile">
            <div class="left">
                <!-- Adjust "selectedOne" class as needed -->
                <div class="left1 selectedOne l1" onclick="showSection('l1')">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="ttt">Account</span>
                </div>
                <div class="left1 l2" onclick="showSection('l2')">
                    <i class="fa-solid fa-question"></i>
                    <span class="ttt">QMS</span>
                </div>
                <!-- The onClick functionality is removed. Add JavaScript if needed. -->
                <a href="/logout" class="left1 left2">
                    <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                    <span class="ttt">Log Out</span>
                </a>
                <a href="/student/home" class="left1 left3">Home</a>
            </div>
            <div class="aright">
                @include('SubPage.StudentProfile.studentProfileOne')
            </div>
            <div class="bright">
                @include('SubPage.StudentProfile.studentProfileTwo')
            </div>
        </div>
    </div>

</body>
{{-- <script src="{{ asset('js/studentProfile.js') }}"></script> --}}

<script>
    var sections = {
        l1: document.querySelector(".aright"),
        l2: document.querySelector(".bright"),
    }

    function showSection(selected) {
        Object.keys(sections).forEach((key) => {
            document.querySelector("." + key).classList.toggle("selectedOne", key == selected);
            sections[key].style.display = key == selected ? "flex" : "none";
        })
    }
</script>

</html>
