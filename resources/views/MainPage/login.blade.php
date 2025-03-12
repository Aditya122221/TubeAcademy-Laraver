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
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>TubeAcademy | Login</title>
</head>

<body>
    <div class="main">
        <div class="loggerandfor">
            <input type="checkbox" class="chk" id="ccc" aria-hidden="true" />

            <div class="signup">
                @if (session("error"))
                <span class="err">{{ session("error") }}</span>
                @endif
                <form method="post">
                    @csrf
                    <label class="label" for="ccc" aria-hidden="true">Log In</label>

                    {{-- <span class="err">error</span> --}}
                    @error('Reg_ID')
                        <span class="err">{{ $message }}</span>
                    @enderror
                    <input class="input" type="text" name="Reg_ID" placeholder="Enter Registration_ID" />

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

                <input class="input" id="pNumber" type="text" name="pNumber" placeholder="Enter Phone Number" required="" />

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
    </script>
</body>

</html>
