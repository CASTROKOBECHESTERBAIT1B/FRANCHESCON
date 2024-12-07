<!-- resources/views/profile.blade.php -->
@extends('layout')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        color: #000;
        position: relative;
        overflow: auto;
        background-image: url('images/form.png');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 1/4;
        background-color: #2d2d2d;
        text-align: center;
        padding: 20px;
        color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h1 {
        font-size: 2rem;
        color: #ff69b4;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    .sidebar ul li {
        margin: 10px 0;
    }

    .sidebar ul li a {
        display: block;
        padding: 10px 15px;
        color: #fff;
        text-decoration: none;
        background-color: #949494;
        border-radius: 5px;
    }

    .sidebar ul li a:hover {
        background-color: #ffb6c1;
    }

    .main-content {
        flex-grow: 1;
        background-color: #f3f3f3;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-left: 20px;
    }

    .main-content h2 {
        font-size: 2rem;
        color: #ff69b4;
    }

    .profile-info {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info p {
        font-size: 18px;
        color: #000;
    }

    .create-post-btn {
        background-color: #ff69b4;
        color: white;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .create-post-btn:hover {
        background-color: #ff4b99;
    }

    .create-post-form {
        display: none;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .create-post-form input, .create-post-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .create-post-form button {
        background-color: #ff69b4;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 20px;
    }

    .create-post-form button:hover {
        background-color: #ff4b99;
    }

    /* Add the gradient animation to the title */
    h2 {
        background-image: 
          linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: move 35s linear infinite;
    }

    @keyframes move {
        to {
            background-position: 4500vh;
        }
    }
</style>

<div class="container">
    <!-- Left Sidebar -->
    <div class="sidebar">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>
        <ul class="space-y-2">
            <li>
                <a href="/" class="block px-4 py-2 rounded hover:bg-gray-700">Home</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Overview</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Posts</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2 class="text-3xl font-semibold mb-6">Welcome to Your Profile!</h2>
        <div class="profile-info bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg">Here you can update your profile details and view your activity.</p>
        </div>
        <br>
        <!-- Create Post Button -->
        <button class="create-post-btn" onclick="togglePostForm()">Create Post</button>

        <!-- Create Post Form -->
        <div class="create-post-form" id="postForm">
            <h3 class="text-xl font-semibold mb-4">Create a New Post</h3>
            <form action="/posts/store" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Post Title" required>
                <textarea name="description" placeholder="Post Description" rows="4" required></textarea>
                <input type="file" name="image" accept="image/*" required>
                <button type="submit">Post</button>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePostForm() {
        var form = document.getElementById("postForm");
        form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
    }
</script>
@endsection
