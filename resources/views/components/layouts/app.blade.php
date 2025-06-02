<nav class="bg-black text-green-400 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold hover:text-green-300 transition">
                    PrimeFit
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a>
                <a href="{{ route('profile.show') }}" class="hover:text-white transition">Profile</a>
                <!-- Add more links as needed -->
            </div>

            <!-- Auth Dropdown -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <span class="text-green-400 font-semibold">{{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="bg-green-700 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-gray-800 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-green-700 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm transition">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Placeholder (optional dropdown toggle) -->
        </div>
    </div>
</nav>
