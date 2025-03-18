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
    <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}">
    <title>TubeAcademy</title>
</head>

<body>
    @include('navbar')
    <div class="mydict">
        <div>
            <label>
                <input type="radio" id="teacher" name="radio" checked="" value="teacher">
                <span>Teacher</span>
            </label>
            <label>
                <input type="radio" id="student" name="radio" value="student">
                <span>Student</span>
            </label>
            <label>
                <input type="radio" id="query" name="radio" value="queries">
                <span>Queries</span>
            </label>
        </div>
    </div>

    <div class="card teacher">
        @forelse ($teacherData as $data)
        <div class="idcard">
            <div class="fancyShape">
                <div class="square"></div>
                <div class="downTriangle"></div>
            </div>
            <div class="hexagon">
                <img class="profileImage" src="{{$data->avatar == "" ? asset('Images/TeamLeader.png') : asset('storage/'.$data->avatar)}}" alt="Image">
            </div>
            <div class="detail">
                <div class="nameAndDes">
                    <div class="name">{{$data->fName}} {{$data->lName}}</div>
                    <div class="desg">Teacher</div>
                </div>
                <div class="personalDetail">
                    <div class="pTitle">
                        <div class="regt">Registration ID</div>
                        <div class="emailt">Email</div>
                        <div class="phonet">Phone</div>
                    </div>
                    <div class="pinfo">
                        <div class="regi">:{{$data->Registration_ID}}</div>
                        <div class="emaili">:{{$data->email}}</div>
                        <div class="phonei">:{{$data->pNumber}}</div>
                    </div>
                </div>
                <button class="uiBtnDelete">Delete User</button>
            </div>
        </div>
        @empty
            <div class="empty">No data found</div>
        @endforelse
    </div>

    <div class="card student hidden">
        @forelse ($studentData as $data)
        <div class="idcard">
            <div class="fancyShape">
                <div class="square"></div>
                <div class="downTriangle"></div>
            </div>
            <div class="hexagon">
                <img class="profileImage" src="{{$data->avatar == "" ? asset('Images/TeamLeader.png') : asset('storage/'.$data->avatar)}}" alt="Image">
            </div>
            <div class="detail">
                <div class="nameAndDes">
                    <div class="name">{{$data->fName}} {{$data->lName}}</div>
                    <div class="desg">Student</div>
                </div>
                <div class="personalDetail">
                    <div class="pTitle">
                        <div class="regt">Registration ID</div>
                        <div class="emailt">Email</div>
                        <div class="phonet">Phone</div>
                    </div>
                    <div class="pinfo">
                        <div class="regi">:{{$data->Registration_ID}}</div>
                        <div class="emaili">:{{$data->email}}</div>
                        <div class="phonei">:{{$data->pNumber}}</div>
                    </div>
                </div>
                <button class="uiBtnDelete">Delete User</button>
            </div>
        </div>
        @empty
            <div class="empty">No data found</div>
        @endforelse
    </div>

    <div class="card query hidden"></div>
</body>
<script src="{{asset("js/adminHome.js")}}"></script>

</html>
