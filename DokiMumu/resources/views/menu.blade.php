<div class="w-64 bg-white dark:bg-gray-800 rounded shadow-lg p-4">
    <ul>
        @if(Auth::check())
            <!-- Profile Section -->
            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <a href="{{ route('profile') }}" class="flex items-center space-x-2">
                    <span class="font-semibold text-black dark:text-white">View Profile</span>
                </a>
            </li>

            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <span class="text-black dark:text-white">Settings</span>
            </li>

            <!-- Dark Mode Toggle -->
            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <span class="text-black dark:text-white">Dark Mode</span>
                <input type="checkbox" id="dark-mode-toggle" class="ml-2" onclick="toggleDarkMode()">
            </li>

            <!-- Log Out -->
            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-black dark:text-white w-full text-left">
                        Log Out
                    </button>
                </form>
            </li>
        @else
            <!-- Login -->
            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <a href="{{ route('login') }}" class="text-black dark:text-white">Login</a>
            </li>
            <!-- Sign Up -->
            <li class="flex items-center space-x-2 mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded">
                <a href="{{ route('register') }}" class="text-black dark:text-white">Sign Up</a>
            </li>
        @endif
    </ul>
</div>
