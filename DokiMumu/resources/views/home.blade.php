<!-- resources/views/home.blade.php -->
@extends('layout')

@section('content')
    <div class="home-content space-y-8">
        <h1 class="text-3xl font-bold text-center">Welcome to DokiMumu</h1>

        @if(Auth::check())
            <p class="text-center text-lg">Hello, {{ Auth::user()->name }}! You can access the menu from the top.</p>

            <!-- Create Post Button -->
            <button class="create-post-btn bg-white p-4 rounded-lg shadow-lg text-lg font-semibold text-center w-full mb-6" onclick="togglePostForm()">
                Create a Post
            </button>

            <!-- Create Post Form -->
            <div class="create-post-form bg-white p-6 rounded-lg shadow-lg space-y-4" id="createPostForm" style="display: none;">
                <h3 class="text-2xl font-semibold">Create a Post</h3>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                placeholder="Enter a title for your post" required>
                        </div>
                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Attach an Image</label>
                            <input type="file" name="image" id="image" 
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:border-gray-300 file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
                        </div>
                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                placeholder="Write something about your post..." required></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <p class="text-center text-lg">Please log in to access all features of the site.</p>
            <a href="{{ route('login') }}" class="btn btn-primary text-center block mt-4">Login</a>
        @endif

        <!-- Community Container -->
        <div class="popular-communities bg-white p-6 rounded-lg shadow-lg space-y-4">
            <h3 class="text-2xl font-semibold">Popular Communities</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if (isset($communities) && $communities)
                    @foreach ($communities as $community)
                        <div class="community-card bg-gray-100 p-4 rounded-lg shadow hover:bg-gray-200 transition duration-300">
                            <img src="{{ asset('images/' . $community->icon) }}" alt="{{ $community->name }}" class="w-16 h-16 mx-auto mb-4 rounded-full">
                            <p class="font-semibold text-center">
                                <a href="/communities/{{ strtolower($community->name) }}" class="text-blue-500 hover:underline">
                                    d/{{ $community->name }}
                                </a>
                            </p>
                            <p class="text-sm text-center text-gray-400">{{ $community->members }} members</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-lg text-gray-500">No communities available at the moment.</p>
                @endif
            </div>
            <a href="#" class="text-blue-500 text-sm font-medium hover:underline mt-4 block text-center">See more</a>
        </div>

        <div style="height: 2000px;"></div>
    </div>

    <script>
        function togglePostForm() {
            var form = document.getElementById("createPostForm");
            form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
        }
    </script>
@endsection
