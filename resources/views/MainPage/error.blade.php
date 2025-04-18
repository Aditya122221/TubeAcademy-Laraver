<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/error.css')}}"> --}}
    <title>TubeAcademy | Error404</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&family=Pixelify+Sans:wght@400..700&display=swap');

        body {
            padding: 0;
            margin: 0;
            user-select: none;
            overflow: hidden;
        }

        .error404 {
            min-height: 100vh;
            background: white;
        }

        .error {
            font-family: "Concert One", sans-serif;
            font-weight: 400;
            font-style: normal;
            background: linear-gradient(0deg, #fff, #03a9f4);
        }

        .sky {
            position: relative;
            widows: 100%;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sky h2 {
            font-size: 16em;
            color: #fff;
            text-shadow: 15px 15px 0 rgba(0, 0, 0, 0.1);
        }

        .sky h2 span {
            color: white;
            display: inline-block;
            animation: animate 2s ease-in-out infinite;
        }

        .sky h2 span:nth-child(even) {
            animation-delay: -1s;
        }

        @keyframes animate {

            0%,
            100% {
                transform: translateY(-50px);
            }

            50% {
                transform: translateY(50px);
            }
        }

        .field {
            padding: 100px;
            height: 40vh;
            background: #6e2308;
            box-shadow: inset 0 20px 10px #51680c;
            text-align: center;
        }

        .field h2 {
            color: #fff;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .field .a {
            background: #fff;
            color: #000;
            width: 160px;
            height: 50px;
            line-height: 50px;
            border-radius: 50px;
            display: inline-block;
            text-decoration: none;
            font-size: 20px;
        }

        .plane {
            position: absolute;
            bottom: 200px;
            right: 100px;
            max-width: 300px;
        }

        .grass {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 20px;
            background: url("../Images/grass.png");
            background-position: bottom;
            animation: animateGrass 0.2s linear infinite;
        }

        @keyframes animateGrass {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 94px 0;
            }
        }
    </style>
</body>

</html>
<div class="error404">
    <div class="error">
        <div class="sky">
            <h2>
                <span>4</span>
                <span>0</span>
                <span>4</span>
            </h2>
            <div class="grass"></div>
            <img src="{{ asset('Images/plane.png') }}" alt="plane" class="plane" />
        </div>
        <div class="field">
            <h2>Opps...looks like you got lost</h2>
            <a href="/" class="a">Go Home</a>
        </div>
    </div>
</div>
