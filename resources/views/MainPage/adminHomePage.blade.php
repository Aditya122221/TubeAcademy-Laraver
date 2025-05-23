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
    {{-- <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}"> --}}
    <title>TubeAcademy</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@100..800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

    body {
        margin: 0;
        padding: 0;
        user-select: none;
        overflow-x: hidden;
    }

    /* -------------------------------Radio Button CSS------------------------------- */

    /* From Uiverse.io by Pradeepsaranbishnoi */
    :focus {
        outline: 0;
        border-color: #f08d03;
        box-shadow: 0 0 0 4px #f08d0390;
    }

    .mydict div {
        display: flex;
        flex-wrap: wrap;
        margin-top: 0.5rem;
        justify-content: center;
    }

    .mydict input[type="radio"] {
        clip: rect(0 0 0 0);
        clip-path: inset(100%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .mydict input[type="radio"]:checked+span {
        box-shadow: 0 0 0 0.0625em #f08d03;
        background-color: #f08d030b;
        z-index: 1;
        color: #f08d03;
    }

    label span {
        display: block;
        cursor: pointer;
        background-color: #fff;
        padding: 0.375em .75em;
        position: relative;
        margin-left: .0625em;
        box-shadow: 0 0 0 0.0625em #b5bfd9;
        letter-spacing: .05em;
        color: #3e4963;
        text-align: center;
        transition: background-color .5s ease;
    }

    label:first-child span {
        border-radius: .375em 0 0 .375em;
    }

    label:last-child span {
        border-radius: 0 .375em .375em 0;
    }

    /* --------------------------------Card Design------------------------------------ */

    .card {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 25px;
    }

    .idcard {
        width: 12cm;
        height: 14cm;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 10px;
    }

    .fancyShape {
        display: flex;
        flex-direction: column;
    }

    .square {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: darkgreen;
        width: 100%;
        height: 2cm;
    }

    .downTriangle {
        width: 100%;
        height: 2cm;
        clip-path: polygon(50% 100%, 0 0, 100% 0);
        background-color: darkgreen;
        border-color: darkgreen;
    }

    .hexagon {
        height: 200px;
        aspect-ratio: cos(30deg);
        clip-path: polygon(-50% 50%, 50% 100%, 150% 50%, 50% 0);
        background: #03da32;
        position: relative;
        top: -130px;
        left: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profileImage {
        width: 150px;
        height: 175px;
        aspect-ratio: cos(30deg);
        clip-path: polygon(-50% 50%, 50% 100%, 150% 50%, 50% 0);
    }

    .detail {
        margin-top: -115px;
    }

    .nameAndDes {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .name {
        font-family: "Bangers", system-ui;
        font-size: 25px;
    }

    .desg {
        font-family: "Playpen Sans", cursive;
        background-color: #03da32;
        padding: 5px;
        border-radius: 10px;
        color: white;
    }

    .personalDetail {
        display: flex;
        margin-top: 25px;
        font-family: "Outfit", sans-serif;
        padding: 25px;
    }

    .pTitle {
        display: flex;
        flex-direction: column;
    }

    .pinfo {
        margin-left: 15px;
    }

    .hidden {
        display: none;
    }

    .uiBtnDelete {
        cursor: pointer;
        border-radius: 5px;
        color: black;
        border-style: solid;
        background-color: transparent;
        border-color: rgb(219, 218, 218);
        width: 48%;
        height: 40px;
        transition: 0.2s ease;
        text-transform: uppercase;
        border-width: 2px;
        font-weight: 500;
        font-size: 18px;
        letter-spacing: 2px;

        &:hover {
            color: rgb(247, 247, 247);
            background-color: rgb(202, 25, 25);
            border-color: rgb(202, 25, 25);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            font-size: 20px;
            letter-spacing: 3px;
        }

        &:active {
            letter-spacing: 0px;
        }
    }

    /* ---------------------------------Query Card---------------------------- */

    .queryCard {
        border-radius: 10px;
        display: flex;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 10px;
    }

    .replyForm {
        display: flex;
        flex-direction: column;
        font-family: "Outfit", sans-serif;
    }

    .disabledInput {
        border: none;
    }

    textarea {
        resize: none;
    }

    .enabledInput {
        border: 2px solid black;
        border-radius: 10px;
        margin-top: 25px;
        padding: 15px;
        outline: none;
    }

    .reply {
        display: flex;
        align-items: center;
        font-family: inherit;
        width: 35%;
        margin-top: 25px;
        cursor: pointer;
        font-weight: 500;
        font-size: 17px;
        padding: 0.8em 1.3em 0.8em 0.9em;
        color: white;
        background: #ad5389;
        background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        border: none;
        letter-spacing: 0.05em;
        border-radius: 16px;
    }

    .reply .svg {
        margin-right: 10px;
        transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
    }

    .reply span {
        transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
    }

    .reply:hover .svg {
        transform: translateX(5px) rotate(45deg);
    }

    .reply:hover span {
        transform: translateX(7px);
    }
</style>

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
                        <input type="text" name="queryID" readonly value="{{ $query->query_ID }}"
                            class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="regisID" class="label">Registration ID:</label>
                        <input type="text" name="regisID" readonly value="{{ $query->Registration_ID }}"
                            class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="fullName" class="label">Name:</label>
                        <input type="text" name="fullName" readonly value="{{ $query->fullname }}"
                            class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="email" class="label">Email:</label>
                        <input type="email" name="email" readonly value="{{ $query->email }}"
                            class="disabledInput">
                    </div>

                    <div class="inputmethod">
                        <label for="message" class="label">Query:</label>
                        <input type="text" name="message" readonly value="{{ $query->message }}"
                            class="disabledInput">
                    </div>
                    @error('replyMessage')
                        <span>{{ $message }}</span>
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
{{-- <script src="{{ asset('js/adminHome.js') }}"></script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const teacherRadio = document.getElementById("teacher");
        const studentRadio = document.getElementById("student");
        const queryRadio = document.getElementById("query");

        const teacherSection = document.querySelector(".teacher");
        const studentSection = document.querySelector(".student");
        const querySection = document.querySelector(".query");

        function updateVisibility() {
            teacherSection.classList.add("hidden");
            studentSection.classList.add("hidden");
            querySection.classList.add("hidden");

            if (teacherRadio.checked) {
                teacherSection.classList.remove("hidden");
            } else if (studentRadio.checked) {
                studentSection.classList.remove("hidden");
            } else if (queryRadio.checked) {
                querySection.classList.remove("hidden");
            }
        }

        teacherRadio.addEventListener("change", updateVisibility);
        studentRadio.addEventListener("change", updateVisibility);
        queryRadio.addEventListener("change", updateVisibility);
    });
</script>

</html>
