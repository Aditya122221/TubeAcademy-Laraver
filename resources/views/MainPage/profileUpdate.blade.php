<?php
session_start();
if ($_SESSION['Reg_ID'] == '') {
    header('Location: /');
    exit();
}

$image = '';
if ($user['avatar'] == '') {
    $image = "{{asset('Images/TeamLeader.png')}}";
} else {
    $image = $user['avatar'];
}

$HomeRouting = '';
$ProfileRouting = '';

if ($_SESSION['role'] == 'admin') {
    $HomeRouting = '/admin/home';
    $ProfileRouting = '/admin/profile';
} elseif ($_SESSION['role'] == 'Teacher') {
    $HomeRouting = '/teacher/home';
    $ProfileRouting = '/teacher/profile';
}
if ($_SESSION['role'] == 'Student') {
    $HomeRouting = '/student/home';
    $ProfileRouting = '/student/profile';
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
    {{-- <link rel="stylesheet" href="{{ asset('css/updateProfile.css') }}"> --}}
    <title>TubeAcademy | Update Profile</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap');

    body {
        margin: 0;
        padding: 0;
        user-select: none;
        overflow: hidden;
    }

    .update {
        display: flex;
        min-height: 100vh;
        justify-content: center;
        align-items: center;
        font-family: "Roboto Slab", serif;
    }

    .updateHeader {
        display: flex;
    }

    .left {
        width: 30%;
        box-shadow: rgba(0, 0, 0, 0.20) 0px 5px 15px;
        padding: 20px;
        border-radius: 10px;
    }

    .left1 {
        display: flex;
        flex-direction: column;
    }

    .left2 {
        display: flex;
        background-color: #22d5d5;
        border-radius: 5px;
        height: 2cm;
        width: 2cm;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .left3 {
        height: 2cm;
        width: 2cm;
    }

    .left6 {
        display: flex;
        flex-direction: column;
    }

    .left7 {
        display: flex;
        margin-top: 0.5cm;
        border-radius: 10px;
        padding: 10px;
        border: 2px solid blue;
        cursor: pointer;
        width: 70%;
        font-weight: bold;
        font-size: 1.2rem;
        align-items: center;
        text-decoration: none;
        color: black;
    }

    .left10 {
        display: flex;
        margin-top: 0.5cm;
        border-radius: 10px;
        padding: 10px;
        border: 2px solid blue;
        cursor: pointer;
        width: 70%;
        flex-direction: column;
        width: 65%;
        box-shadow: rgba(0, 0, 0, 0.20) 0px 5px 15px;
        margin-left: 25px;
        border-radius: 10px;
    }

    .right1 {
        display: flex;
        border-bottom: 2px solid black;
        padding: 25px;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .right2 {
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .right3 {
        display: flex;
    }

    .right4 {
        display: flex;
        flex-direction: column;
    }

    .right5 {}

    .right6 {
        height: 1cm;
        width: 80%;
        border-radius: 5px;
        padding: 2px;
        padding-left: 0.4cm;
        border: 2px solid black;
        margin-top: 6px;
        outline: 0;
        background-color: transparent;
        color: black;
        font-family: 'Chakra Petch';
        font-size: 1.3rem;
    }

    .right7 {
        height: 5cm;
        width: 90%;
        border-radius: 5px;
        padding: 2px;
        padding-left: 0.4cm;
        border: 2px solid black;
        margin-top: 6px;
        outline: 0;
        background-color: transparent;
        color: black;
        font-family: 'Chakra Petch';
        font-size: 1.3rem;
        resize: none;
        padding: 10px;
    }

    .right8 {
        display: flex;
        height: 1cm;
        margin: auto;
        margin-top: 10px;
        color: white;
        background-color: orange;
        font-size: 1.3rem;
        cursor: pointer;
        border: 2px solid orange;
        border-radius: 5px;
        align-items: center;
        justify-content: center;
        padding: 15px;

        &:hover {
            background-color: #764f05;
            border: 2px solid #764f05;
        }
    }

    .right9 {
        display: none;
        border-radius: 0.375rem;
        background-color: #d1e7dd;
        color: #0a3622;
        font-family: sans-serif;
        font-size: .9rem;
        padding: 10px 25px;
        border: 1px solid #a3cfbb;
        margin-top: 5px;
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 15px;
    }

    .right10 {
        color: red;
    }

    .right11 {
        display: none;
        border-radius: 0.375rem;
        background-color: #f8d7da;
        color: #58151c;
        font-family: sans-serif;
        font-size: .9rem;
        padding: 10px 25px;
        border: 1px solid #f1aeb5;
        margin-top: 5px;
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 15px;
    }

    @media(max-width: 700px) {
        .updateHeader {
            flex-direction: column;
        }

        .left {
            width: 100%;
        }

        .right {
            width: 100%;
            margin-top: 15px;
        }
    }
</style>

<body>
    <div class="update">
        <div class="updateHeader">
            <div class="left">
                <div class="left1">
                    <div class="left2">
                        {{-- <img src={{$image}} class="left3" alt="User Image" /> --}}
                        <img src="{{ $user['avatar'] == '' ? asset('Images/TeamLeader.png') : asset('storage/' . $user->avatar) }}"
                            class="left3" alt="User Image" />
                    </div>
                    <div class="left4">{{ $user['fName'] }} {{ $user['lName'] }}</div>
                    <div class="left5">{{ $user['email'] }}</div>
                </div>
                <div class="left6">
                    <a href='{{ $ProfileRouting }}' class="left7">
                        <span class="material-symbols-outlined left8">
                            account_circle
                        </span>
                        <div class="left9">Account</div>
                    </a>
                    <div class="left10">
                        <span class="material-symbols-outlined llee">
                            edit
                        </span>
                        <div class="left11">Edit</div>
                    </div>
                    <a href='{{ $HomeRouting }}' class="left12">
                        <div class="left13">Home</div>
                    </a>
                </div>
            </div>
            <div class="right">
                <div class="right1">Update Data</div>

                <form method="post" action="{{ route('profileupdating') }}" class="right2"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="right3">

                        <div class="right4">
                            <label for="fname" class="right5">First Name</label>
                            @error('fName')
                                <span class="right10">{{ $message }}</span>
                            @enderror

                            <input type="text" value="{{ $user['fName'] }}" class="right6" name="fname" required>
                        </div>

                        <div class="right4">
                            <label for="lname" class="right5">Last Name</label>
                            @error('lName')
                                <span class="right10">{{ $message }}</span>
                            @enderror

                            <input type="text" value="{{ $user['lName'] }}" class="right6" name="lname" required>
                        </div>
                    </div>
                    <div class="right3">

                        <div class="right4">
                            <label for="email" class="right5">Email</label>
                            <input type="text" value="{{ $user['email'] }}" class="right6" name="email">
                        </div>

                        <div class="right4">
                            <label for="pnumber" class="right5">Phone Number</label>
                            <input type="text" value="{{ $user['pNumber'] }}" class="right6" name="pnumber"
                                disabled>
                        </div>
                    </div>

                    <label for="address" class="right5">Address</label>
                    <textarea name="address" class="right7">{{ $user['address'] }}</textarea>

                    @error('avatar')
                        <span class="right10">{{ $message }}</span>
                    @enderror
                    <input type="file" name="avatar" accept="image/*">

                    <button type="submit" class="right8">Update</button>
                </form>

                {{-- <span class="right9">Updated</span>
                <span class="right11">Updation Failed</span> --}}
            </div>
        </div>
    </div>
</body>

</html>
