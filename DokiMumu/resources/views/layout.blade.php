<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DokiMumu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            display: flex;
            margin: 0;
            overflow: hidden;
            height: 100vh;
            padding-top: 60px;
            background-color: white;
            color: black;
            box-sizing: border-box;
        }

        .navbar {
            width: 100%;
            height: 60px;
            z-index: 10;
            background-color: #121212;
            color: white;
            border-bottom: 2px solid #cccccc;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .navbar .logo {
            flex-shrink: 0;
        }

        .navbar .search-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 4;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar input {
            width: 100%;
            max-width: 500px;
            padding: 9px;
            border-radius: 30px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
            text-align: center; /* Center the placeholder text */
        }

        .navbar input::placeholder {
            text-align: center; /* Ensure the placeholder is centered */
        }

        .navbar input:focus {
            border-color: #ff4500;
        }

        .sidebar {
            width: 240px;
            padding: 20px;
            left: 0;
            top: 60px;
            position: fixed;
            bottom: 0;
            overflow-y: auto;
            color: black;
            border-right: 2px solid #cccccc;
            box-sizing: border-box;
        }

        .sidebar a {
            color: black;
            text-decoration: none;
            font-size: 15px;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin: 2px 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #e3e8e7;
            border-radius: 5px;
        }

        .sidebar a img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .content {
            flex-grow: 1;
            margin-left: 240px;
            margin-top: 60px;
            padding: 20px;
            box-sizing: border-box;
            background-color: #f5f5f5;
            color: black;
            overflow-y: auto;
            padding-right: 320px; /* Add padding to make space for right-sidebar */
        }

        .right-sidebar {
            width: 300px;
            position: fixed;
            right: 0;
            top: 60px;
            bottom: 0;
            overflow-y: auto;
            background-color: #fff;
            padding: 20px;
            color: black;
            box-sizing: border-box;
            border-left: 2px solid #cccccc;
        }

        .toggle-button {
            position: fixed;
            top: 7px;
            right: 20px;
            background-color: #ff4500;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 11;
            border-radius: 24px;
        }

        .menu {
            display: none;
            position: fixed;
            top: 60px;
            right: 0;
            background-color: white;
            color: black;
            width: 300px;
            height: 100%;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            z-index: 12;
            border-left: 1px solid #ccc;
        }

        body.dark {
            background-color: #121212;
            color: white;
        }

        body.dark .navbar {
            background-color: #1a1a1b;
            color: white;
            border-bottom: 2px solid #444;
        }

        body.dark .sidebar {
            background-color: #2b2b2b;
            color: white;
            border-right: 2px solid #444;
        }

        body.dark .content {
            background-color: #202020;
            color: white;
        }

        body.dark .right-sidebar {
            background-color: #333;
            color: white;
        }

        body.dark .menu {
            background-color: #333; 
            color: white;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.5);
            border-left: 1px solid #555;
        }

        body.dark input {
            background-color: #444;
            color: white;
            border-color: #666;
        }

        body.dark input:focus {
            border-color: #ff4500;
        }

        body.dark .sidebar a {
            color: white;
        }

        body.dark .sidebar a:hover {
            background-color: #444;
        }

        /* Hide elements on the login page */
        @if(Route::currentRouteName() == 'login')
            .navbar, .sidebar, .right-sidebar {
                display: none;
            }
        @endif
    </style>
</head>
<body>
    <div class="navbar">
        <span class="logo">DokiMumu</span>

        <div class="search-wrapper">
            <input type="text" placeholder="Search" class="search-bar">
        </div>

        @if(Auth::check())
            <button class="toggle-button" onclick="toggleMenu()">Menu</button>
        @else
            <a href="{{ route('login') }}" class="toggle-button">Login</a>
        @endif
    </div>

    <div class="sidebar">
        <a href="/home">
            <img src="{{ asset('images/home-icon.png') }}" alt="Home">
            Home
        </a>
        <a href="/profile">
            <img src="{{ asset('images/profile-icon.png') }}" alt="Profile">
            Profile
        </a>
        <a href="/about">
            <img src="{{ asset('images/about-icon.png') }}" alt="About">
            About
        </a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="right-sidebar">
        @yield('sidebar')
    </div>

    <div id="menu" class="menu">
        @include('menu')
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
        }

        function toggleDarkMode() {
            const body = document.body;
            body.classList.toggle("dark");
        }
    </script>

    <style>
    /* Hide elements when on login or register page */
    @if(Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register')
        .navbar, .sidebar, .right-sidebar {
            display: none;
        }
    @endif
</style>

</body>
</html>
