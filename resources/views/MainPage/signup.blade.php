<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: /');
    exit();
}

if ($_SESSION['role'] != 'admin') {
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
    {{-- <link rel="stylesheet" href="{{asset('css/signup.css')}}"> --}}
    <title>TubeAcademy | SignUp</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lemon&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

    /* styles.css */

    body {
        margin: 0;
        padding: 0;
        user-select: none;
        overflow: hidden;
    }

    .sigern {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #ff7e5f, #feb47b);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .logoType {
        width: 7cm;
        height: 7cm;
        animation: roundaboat 10s linear infinite;
        transition: .5s;
        cursor: pointer;

        &:hover {
            animation: none;
        }
    }

    @keyframes roundaboat {

        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(180deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .container {
        display: flex;
        background: transparent;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        max-width: 900px;
        width: 100%;
        overflow: hidden;
    }

    .illustration {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .formContainer {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: white;
        border-radius: 10px;
    }

    .button {
        background: #ff7e5f;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
        width: 75%;
    }

    .button:hover {
        background: #feb47b;
    }

    .p {
        font-family: 'Lemon';
        margin-top: 10px;
    }

    .a {
        color: #ff7e5f;
        text-decoration: none;
    }

    .a:hover {
        text-decoration: underline;
    }

    .eeror {
        color: red;
        font-family: 'Ubuntu';
    }

    .radioInput {
        display: flex;
        align-items: center;
        gap: 2px;
        background-color: #908e8e;
        padding: 4px;
        border-radius: 10px;
        width: fit-content;
    }

    .radioInput input {
        display: none;
    }

    .radioInput .label {
        width: 90px;
        height: 60px;
        background: linear-gradient(to bottom, #fafafa, rgb(245, 149, 4));
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px;
        transition: all 0.1s linear;
        border-top: 1px solid #4e4d4d;
        background-color: #333333;
        position: relative;
        cursor: pointer;
        box-shadow: 0px 17px 5px 1px rgba(241, 182, 2, 0.2);
    }

    .label:has(input[type="radio"]:checked) {
        box-shadow: 0px 17px 5px 1px rgba(0, 0, 0, 0);
        background: linear-gradient(to bottom, #cf9138, #cf903841);
        border-top: none;
    }

    .label:first-child {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .label:last-child {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .label::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 103%;
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(to bottom,
                transparent 10%,
                transparent,
                transparent 90%);
        transition: all 0.1s linear;
        z-index: -1;
    }

    .label:has(input[type="radio"]:checked)::before {
        background: linear-gradient(to bottom,
                transparent 10%,
                #cae2fd63,
                transparent 90%);
    }

    .label .text {
        color: black;
        font-size: 15px;
        line-height: 12px;
        padding: 0px;
        font-weight: 800;
        text-transform: uppercase;
        transition: all 0.1s linear;
        text-shadow:
            -1px -1px 1px rgb(224, 224, 224, 0.1),
            0px 2px 3px rgb(0, 0, 0, 0.3);
    }

    .label input[type="radio"]:checked+.text {
        color: rgb(202, 226, 253);
        text-shadow: 0px 0px 12px #cae2fd;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .illustration {
            display: none;
        }
    }
</style>

<body>
    <div>
        <div class="sigern">
            <div class="container">
                <div class="illustration">
                    <a href="/admin/home"><img class="logoType" src="{{ asset('Images/Logo.png') }}"
                            alt="Illustration" /></a>
                </div>
                <div class="formContainer">
                    <h2 class="h2">Create Account</h2>
                    <span class="succ">{{ session('success') }}</span>
                    <form class="form" method="post">
                        @csrf
                        <label class="label" for="fName">First Name:</label>
                        <!-- Optional: Insert error message here if applicable -->
                        <input type="text" id="first-name" name="fName" required class="inputField" />

                        <label class="label" for="lName">Last Name:</label>
                        <!-- Optional: Insert error message here if applicable -->
                        <input type="text" id="last-name" name="lName" required class="inputField" />

                        <label class="label" for="pNumber">Phone Number:</label>
                        <!-- Optional: Insert error message here if applicable -->
                        <input type="text" id="phone" name="pNumber" required class="inputField" minlength="10"
                            maxlength="10" />

                        <div class="radioInput">
                            <label class="label">
                                <input type="radio" name="role" value="admin" class="value1" />
                                <span class="text">Admin</span>
                            </label>
                            <label class="label">
                                <input type="radio" name="role" value="Teacher" class="value1" />
                                <span class="text">Teacher</span>
                            </label>
                            <label class="label">
                                <input type="radio" name="role" value="Student" class="value1" />
                                <span class="text">Student</span>
                            </label>
                        </div>

                        <label class="label" for="password">Password:</label>
                        <!-- Optional: Insert error message here if applicable -->
                        <input type="password" id="password" name="password" required class="inputField" />

                        <label class="label" for="cPassword">Confirm Password:</label>
                        <!-- Optional: Insert error message here if applicable -->
                        <input type="password" id="confirm-password" name="cPassword" required class="inputField" />

                        <button class="button" type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
