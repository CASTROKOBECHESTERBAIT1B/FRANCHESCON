@extends('layout') <!-- Extend the main layout -->

@section('content')
<div class="reset-password-container">
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Input -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- New Password Input -->
        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="reset-btn">
            Reset Password
        </button>
    </form>
</div>
@endsection

@section('head')
    <!-- Link to reset-specific CSS file -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
@endsection
