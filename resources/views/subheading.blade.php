{{-- <link rel="stylesheet" href="{{ asset('css/subheading.css') }}"> --}}

<style>
    .container {
        margin-top: 1cm;
        padding: 10px;
        background-color: #333;
        display: flex;
        justify-content: space-between;
        padding-left: 1cm;
        user-select: none;
        backdrop-filter: blur(25px);
        border-bottom: 2px solid #ffffff33;
        position: relative;
        z-index: 1;
        overflow-x: hidden;
    }

    .container::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, #ffffff66, transparent);
        transition: .5s;
    }

    .container:hover::before {
        left: 100%;
    }

    .classin {
        color: white;
        display: flex;
        padding: 5px;
        font-family: "Fredoka";
        font-size: 28px;
        border: 5px solid #333;
        cursor: pointer;
        text-decoration: none;

        &:hover {
            text-decoration: underline 2px;
        }
    }
</style>
<div class="container">
    <a href="/student/nine" class="classin">Class IX</a>
    <a href="/student/ten" class="classin">Class X</a>
    <a href="/student/eleven" class="classin">Class XI</a>
    <a href="/student/twelve" class="classin">Class XII</a>
</div>
