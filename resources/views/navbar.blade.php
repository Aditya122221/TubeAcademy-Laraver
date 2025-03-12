<?php
$homeRouting = '';
$profileRouting = '';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $homeRouting = '/admin/home';
        $profileRouting = '/admin/profile';
    } elseif ($_SESSION['role'] == 'Teacher') {
        $homeRouting = '/teacher/home';
        $profileRouting = '/teacher/profile';
    } elseif ($_SESSION['role'] == 'Student') {
        $homeRouting = '/student/home';
        $profileRouting = '/student/profile';
    }
}
?>
<link rel="stylesheet" href="{{asset('css/navbar.css')}}">
<div class="navbarr">
    <header class="header">
        <nav class="navbar">
            <a href='{{ $homeRouting }}' class="navLogo">
                <img src="{{ asset('Images/Logo.png') }}" alt="Logo" class="logo" />
            </a>
            <ul class="navMenu">
                <li class="navItem">
                    <a href="{{ $homeRouting }}" class="navLink">Home</a>
                </li>
                <li class="navItem">
                    <a href="/askai" class="navLink">Ask AI</a>
                </li>
                <li class="navItem">
                    <a href="/contact" class="navLink">Contact Us</a>
                </li>
                <li class="navItem">
                    <a href='{{ $profileRouting }}' class="navLink">Profile</a>
                </li>
            </ul>
        </nav>
    </header>
</div>
