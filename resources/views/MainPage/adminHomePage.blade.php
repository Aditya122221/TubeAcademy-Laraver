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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <img class="profileImage"
                        src="{{ $data->avatar == '' ? asset('Images/TeamLeader.png') : asset('storage/' . $data->avatar) }}"
                        alt="Image">
                </div>
                <div class="detail">
                    <div class="nameAndDes">
                        <div class="name">{{ $data->fName }} {{ $data->lName }}</div>
                        <div class="desg">Teacher</div>
                    </div>
                    <div class="personalDetail">
                        <div class="pTitle">
                            <div class="regt">Registration ID</div>
                            <div class="emailt">Email</div>
                            <div class="phonet">Phone</div>
                        </div>
                        <div class="pinfo">
                            <div class="regi">:{{ $data->Registration_ID }}</div>
                            <div class="emaili">:{{ $data->email }}</div>
                            <div class="phonei">:{{ $data->pNumber }}</div>
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
                    <img class="profileImage"
                        src="{{ $data->avatar == '' ? asset('Images/TeamLeader.png') : asset('storage/' . $data->avatar) }}"
                        alt="Image">
                </div>
                <div class="detail">
                    <div class="nameAndDes">
                        <div class="name">{{ $data->fName }} {{ $data->lName }}</div>
                        <div class="desg">Student</div>
                    </div>
                    <div class="personalDetail">
                        <div class="pTitle">
                            <div class="regt">Registration ID</div>
                            <div class="emailt">Email</div>
                            <div class="phonet">Phone</div>
                        </div>
                        <div class="pinfo">
                            <div class="regi">:{{ $data->Registration_ID }}</div>
                            <div class="emaili">:{{ $data->email }}</div>
                            <div class="phonei">:{{ $data->pNumber }}</div>
                        </div>
                    </div>
                    <button class="uiBtnDelete">Delete User</button>
                </div>
            </div>
        @empty
            <div class="empty">No data found</div>
        @endforelse
    </div>

    <div class="card query hidden">
        @forelse ($queries as $query)
            <div class="queryCard">
                <form method="post" class="replyForm" action="/reply">
                    @csrf
                    <div class="inputmethod">
                        <label for="queryID" class="label">Query ID:</label>
                        <input type="text" name="queryID" readonly value="{{$query->query_ID}}" class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="regisID" class="label">Registration ID:</label>
                        <input type="text" name="regisID" readonly value="{{$query->Registration_ID}}" class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="fullName" class="label">Name:</label>
                        <input type="text" name="fullName" readonly value="{{$query->fullname}}" class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="email" class="label">Email:</label>
                        <input type="email" name="email" readonly value="{{$query->email}}" class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="message" class="label">Query:</label>
                        <input type="text" name="message" readonly value="{{$query->message}}" class="disabledInput">
                    </div>
                    @error("replyMessage")
                        <span>{{$message}}</span>
                    @enderror
                    <textarea name="replyMessage" class="enabledInput"></textarea>

                    <button type="submit" class="reply">
                        <i class="fa-solid fa-rocket svg" style="color: #fcfafa;"></i>
                        <span>Reply</span>
                    </button>
                </form>
            </div>
        @empty
            <div>No data found</div>
        @endforelse
    </div>
</body>
<script src="{{ asset('js/adminHome.js') }}"></script>

</html>
