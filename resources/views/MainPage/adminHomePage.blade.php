<?php
session_start();
if(!isset($_SESSION["role"])){
    header("Location: /");
    exit;
}

if($_SESSION["role"] != "admin"){
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TubeAcademy</title>
</head>

<body>
    @include("navbar")
    <h1>Admin Home Page</h1>
</body>

</html>
