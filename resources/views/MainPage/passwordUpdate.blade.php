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
    <link rel="stylesheet" href="{{ asset('css/forgotPas.css') }}">
    <title>TubeAcademy | Forgot Password</title>
</head>

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
