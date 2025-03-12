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
    <link rel="stylesheet" href="{{ asset('css/updateProfile.css') }}">
    <title>TubeAcademy | Update Profile</title>
</head>

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
