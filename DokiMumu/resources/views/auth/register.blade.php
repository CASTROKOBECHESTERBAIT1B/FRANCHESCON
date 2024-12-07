@extends('layout')

@section('content')
    <div class="flex justify-center items-center h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-24"> <!-- Replace with your logo -->
            </div>

            <h2 class="text-2xl font-bold text-center mb-4">Sign Up</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full p-3 mt-2 border rounded-md" required autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full p-3 mt-2 border rounded-md" required>
                    @error('email')
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

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="w-full p-3 mt-2 border rounded-md" required>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-center gap-4 mb-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-gray-800 to-gray-700 text-white py-3 rounded-md hover:bg-gray-600">Sign Up</button>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('login') }}" class="w-full bg-orange-500 text-white py-3 rounded-md hover:bg-orange-400 text-center">Already have an account? Log In</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('extra-css')
    <style>
        /* Hide elements on the register page */
        body {
            overflow: hidden;
        }

        .navbar, .sidebar, .right-sidebar {
            display: none;
        }
    </style>
@endsection
