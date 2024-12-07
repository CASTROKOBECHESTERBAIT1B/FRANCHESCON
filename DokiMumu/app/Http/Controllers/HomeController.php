<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Apply the 'auth' middleware to ensure the user is logged in
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard for authenticated users.
     */
    public function index()
    {
        // Check if the user is authenticated and if their role is admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Mock popular communities
        $communities = [
            (object) ['name' => 'NBA2k', 'icon' => 'nba2k.png', 'members' => 2000],
            (object) ['name' => 'Minecraft', 'icon' => 'minecraft.png', 'members' => 5000],
            (object) ['name' => 'Fitness', 'icon' => 'fitness.png', 'members' => 1500],
            (object) ['name' => 'PS4', 'icon' => 'ps4.png', 'members' => 3000],
        ];

        // Pass communities to the view
        return view('home', compact('communities'));
    }
}
