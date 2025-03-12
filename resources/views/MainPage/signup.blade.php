<?php
session_start();
if(!isset($_SESSION["role"])){
    header('Location: /');
    exit;
}

if($_SESSION["role"] != 'admin'){
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">
    <title>TubeAcademy | SignUp</title>
</head>

<body>
    <div>
        <div class="sigern">
            <div class="container">
                <div class="illustration">
                    <a href="/admin/home"><img class="logoType" src="{{asset('Images/Logo.png')}}" alt="Illustration" /></a>
                </div>
                <div class="formContainer">
                    <h2 class="h2">Create Account</h2>
                    <span class="succ">{{session('success')}}</span>
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
