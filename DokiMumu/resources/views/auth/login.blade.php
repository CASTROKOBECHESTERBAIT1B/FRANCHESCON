@extends('layout')

@section('content')
    <div class="flex justify-center items-center h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="DokiMumu" class="w-24 h-24"> <!-- You can replace logo.png with your image -->
            </div>

            <h2 class="text-2xl font-bold text-center mb-4">Log In</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email_or_username" class="block text-sm font-medium text-gray-700">Email or Username</label>
                    <input id="email_or_username" type="text" name="email_or_username" value="{{ old('email_or_username') }}" class="w-full p-3 mt-2 border rounded-md" required autofocus>
                    @error('email_or_username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" class="w-full p-3 mt-2 border rounded-md" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
                </div>

                <div class="flex justify-center gap-4 mb-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-gray-800 to-gray-700 text-white py-3 rounded-md hover:bg-gray-600">Log In</button>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('register') }}" class="w-full bg-orange-500 text-white py-3 rounded-md hover:bg-orange-400 text-center">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
