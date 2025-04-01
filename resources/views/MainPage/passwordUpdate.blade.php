<?php
session_start();
if (isset($_SESSION['Reg_ID'])) {
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
    {{-- <link rel="stylesheet" href="{{ asset('css/forgotPas.css') }}"> --}}
    <title>TubeAcademy | Forgot Password</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap');

    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .logger {
        background-color: #cf9138;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        display: flex;
        justify-content: space-between;
        width: 40%;
        max-width: 1200px;
        background-color: #cf9138;
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .phoneNumberInput {
        width: 100%;
        margin: auto;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: transparent;
    }

    .phoneNumberInput:focus {
        border-color: #e5a341;
        outline: none;
    }

    .loginButton {
        cursor: pointer;
        width: 100%;
        padding: 15px;
        font-family: 'Black Ops One';
        background-color: #cf9138;
        color: white;
        font-size: 1.2rem;

        &:hover {
            background-color: #7a4b04;
        }
    }

    .forgotPassword {
        cursor: pointer;
        width: 100%;
        padding: 15px;
        font-family: 'Black Ops One';
        font-size: 1.2rem;
        margin-top: 10px;

        &:hover {
            background-color: #7a4b04;
            color: white;
        }

    }

    .forgotPas {
        flex: 1.5;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 10px;
    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="logger">
        <div class="container">
            <div class="forgotPas">
                <form method="post" action="{{ route('passwordupdating') }}">
                    @csrf

                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <input type="password" placeholder="Enter New Password" required class="phoneNumberInput"
                        name="password" />

                    @error('cpassword')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input type="password" placeholder="Re-enter Password" required class="phoneNumberInput"
                        name="cpassword" />

                    <button type="submit" class="loginButton">Update Password</button>

                    <button onclick="window.location.href='{{ route('backtologin') }}'" class="forgotPassword">Back to
                        LogIn</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
