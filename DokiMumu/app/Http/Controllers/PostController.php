<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Method to store a new post
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create new post instance
        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->user_id = auth()->id(); // Assuming a user must be logged in to post

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $post->image_path = $imagePath;
        }

        $post->save(); // Save post to database

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    // Method to display all posts
    public function index()
    {
        $posts = Post::latest()->get(); // Get all posts in descending order
        return view('home', compact('posts')); // Pass posts to home view
    }
}
