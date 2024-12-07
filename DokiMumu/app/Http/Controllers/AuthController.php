<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration logic
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);  // Log in the user automatically after registration

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_or_username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login using email or username
        $credentials = $request->only('password');

        // Check if the provided value is an email or a username
        $user = User::where('email', $request->email_or_username)->first();

        if (!$user) {
            $user = User::where('username', $request->email_or_username)->first();  // Check for username
        }

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);  // Log the user in
            return redirect()->intended('/');  // Redirect to home page
        }

        return back()->withErrors([
            'email_or_username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
