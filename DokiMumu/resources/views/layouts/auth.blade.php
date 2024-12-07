<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Your main CSS file -->
    @yield('head')
</head>
<body>
    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 min-h-screen">
        @yield('content')
    </div>
</body>
</html>
