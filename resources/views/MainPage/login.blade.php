<?php
session_start();
if (isset($_SESSION['role'])) {
    $routing = '';
    if ($_SESSION['role'] == 'admin') {
        $routing = '/admin/home';
    } elseif ($_SESSION['role'] == 'Teacher') {
        $routing = '/teacher/home';
    } elseif ($_SESSION['role'] == 'Student') {
        $routing = '/student/home';
    }

    header("Location: $routing");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    <title>TubeAcademy | Login</title>
</head>
<style>
    /* importing */

    @import url('https://fonts.googleapis.com/css2?family=Lemon&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Iceberg&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap');


    body {
        margin: 0;
        padding: 0;
        user-select: none;
    }

    .main {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    }

    .loggerandfor {
        width: 30%;
        height: 600px;
        overflow: hidden;
        background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
    }

    .chk {
        display: none;
    }

    .signup {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .label {
        color: #fff;
        font-size: 1.9rem;
        justify-content: center;
        display: flex;
        margin: 50px;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
        font-family: 'Black Ops One';
    }

    .input {
        width: 60%;
        height: 10px;
        background: #e0dede;
        justify-content: center;
        display: flex;
        margin: 20px auto;
        padding: 25px;
        border: none;
        outline: none;
        border-radius: 5px;
        font-family: "Iceberg", sans-serif;
        font-size: 1.2rem;
    }

    .button {
        width: 75%;
        height: 50px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 30px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
        font-family: 'Source Code Pro';
        font-size: 1.2rem;
    }

    button:hover {
        background: #6d44b8;
    }

    .login {
        height: 460px;
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(-200px);
        transition: .8s ease-in-out;
    }

    .login label {
        color: #573b8a;
        transform: scale(.6);
    }

    .chk:checked~.login {
        transform: translateY(-130%);
    }

    .chk:checked~.signup label {
        transform: scale(.6);
    }

    .radioInputs {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        border-radius: 0.5rem;
        background-color: #EEE;
        box-sizing: border-box;
        box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
        padding: 0.25rem;
        width: 72%;
        margin: auto;
        font-family: "Iceberg", sans-serif;
        font-size: 1rem;
    }

    .radioInputs .radio {
        flex: 1 1 auto;
        text-align: center;
    }

    .radioInputs .radio input {
        display: none;
    }

    .radioInputs .radio .name {
        display: flex;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: none;
        padding: .5rem 0;
        color: rgba(51, 65, 85, 1);
        transition: all .15s ease-in-out;
    }

    .radioInputs .radio input:checked+.name {
        background-color: #573b8a;
        color: white;
        font-weight: 600;
    }

    .err {
        display: block;
        color: red;
        text-align: center;
        width: 100%;
        font-size: .7rem;
    }

    .mobileView {
        color: white;
        font-size: 30px;
    }
</style>

<body>
    <div class="main">
        <div class="loggerandfor">
            <input type="checkbox" class="chk" id="ccc" aria-hidden="true" />

            <div class="signup">
                <form method="post">
                    @csrf
                    <label class="label" for="ccc" aria-hidden="true">Log In</label>

                    {{-- <span class="err">error</span> --}}
                    @if (session('error'))
                        <span class="err">{{ session('error') }}</span>
                    @endif
                    @error('Reg_ID')
                        <span class="err">{{ $message }}</span>
                    @enderror
                    <input class="input" type="text" name="Reg_ID" placeholder="Enter Phone Number" />

                    @error('password')
                        <span class="err">{{ $message }}</span>
                    @enderror
                    <input class="input" type="password" name="password" placeholder="Enter Password" />

                    @error('role')
                        <span class="err">{{ $message }}</span>
                    @enderror
                    <div class="radioInputs">

                        <label class="radio">
                            <input value="admin" type="radio" name="role" />
                            <span class="name">admin</span>
                        </label>

                        <label class="radio">
                            <input value="Teacher" type="radio" name="role" />
                            <span class="name">Teacher</span>
                        </label>

                        <label class="radio">
                            <input value="Student" type="radio" name="role" />
                            <span class="name">Student</span>
                        </label>
                    </div>

                    <button class="button" type="submit">Log In</button>

                </form>
            </div>

            <div class="login">

                <label class="label" for="ccc" aria-hidden="true">Forgot Password</label>

                {{-- <span class="err">fError"</span> --}}

                <input class="input" type="text" id="regis" name="regis" placeholder="Enter Registration ID"
                    required="" />

                <input class="input" id="pNumber" type="text" name="pNumber" placeholder="Enter Phone Number"
                    required="" />

                <div class="radioInputs">
                    <label class="radio">
                        <input value="fadmin" type="radio" name="frole" />
                        <span class="name">admin</span>
                    </label>

                    <label class="radio">
                        <input value="fTeacher" type="radio" name="frole" />
                        <span class="name">Teacher</span>
                    </label>

                    <label class="radio">
                        <input value="fStudent" type="radio" name="frole" />
                        <span class="name">Student</span>
                    </label>
                </div>

                <button onclick="redirectToRoute()" class="button" type="submit">Next</button>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/login.js') }}"></script> --}}

    <script>
        function redirectToRoute() {
            // Get input values
            let regis = document.getElementById("regis").value;
            let pNumber = document.getElementById("pNumber").value;
            let frole = document.querySelector('input[name="frole"]:checked');

            // Check if all fields are filled
            if (!regis || !pNumber || !frole) {
                alert("Please fill all fields.");
                return;
            }

            // Redirect to Laravel route with parameters
            window.location.href = `{{ url('/visiting') }}/${regis}/${pNumber}/${frole.value}`;
        }

        function mobileViewDesign() {
            let main = document.querySelector(".main")

            if (window.innerWidth < 1000) {
                if (main) main.remove();

                document.body.style.display = "flex"
                document.body.style.minHeight = "100vh"
                document.body.style.justifyContent = "center"
                document.body.style.alignItems = "center"
                document.body.style.backgroundColor = "black"

                let mobileView = document.createElement("div")
                mobileView.className = "mobileView"
                mobileView.textContent = "We are working on different view. Please check this on PC"

                document.body.appendChild(mobileView)
            }
        }
        window.addEventListener("resize", mobileViewDesign);
        mobileViewDesign();
    </script>
</body>

</html>
