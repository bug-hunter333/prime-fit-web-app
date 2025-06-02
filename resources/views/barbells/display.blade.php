<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="bg-black bg-opacity-90 text-green-500 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-3xl md:text-4xl font-extrabold hover:text-green-400 transition duration-300 transform hover:scale-105">
            PrimeFit
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-6">
            @auth
            <!-- Dropdown -->
            <div class="relative group">
                <button class="flex items-center bg-gray-900 px-4 py-2 rounded font-semibold hover:bg-green-600 hover:text-white transition">
                    <i class="fas fa-user-circle mr-2"></i> {{ Auth::user()->name }}
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <div class="absolute hidden group-hover:block mt-2 right-0 bg-gray-800 w-44 rounded shadow-lg z-50 py-2">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-green-600 transition">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-600 transition">Logout</button>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="flex items-center bg-gray-900 px-4 py-2 rounded hover:bg-green-600 hover:text-white transition">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </a>
            <a href="{{ route('register') }}" class="flex items-center bg-gray-900 px-4 py-2 rounded hover:bg-green-600 hover:text-white transition">
                <i class="fas fa-user-plus mr-2"></i> Register
            </a>
            @endauth

            <a href="{{ url('/addt_cart.php') }}" class="flex items-center bg-gray-900 px-4 py-2 rounded hover:bg-green-600 hover:text-white transition">
                <i class="fas fa-shopping-cart mr-2"></i> Cart
            </a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-10">

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="mb-6 max-w-3xl mx-auto bg-green-900 border border-green-600 text-green-400 px-4 py-3 rounded-md font-medium">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-6 max-w-3xl mx-auto bg-red-900 border border-red-600 text-red-400 px-4 py-3 rounded-md font-medium">
        {{ session('error') }}
    </div>
    @endif

    <!-- Heading -->
    <h1 class="text-3xl md:text-4xl font-bold mb-10 text-center">🛒 Your Shopping Cart</h1>

    <!-- Cart Table -->
    <div class="overflow-x-auto bg-gray-800 border border-gray-700 rounded-xl shadow-xl max-w-6xl mx-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-700 text-gray-300 uppercase text-xs font-semibold">
                <tr>
                    <th class="p-4 text-left">Image</th>
                    <th class="p-4 text-left">Product</th>
                    <th class="p-4 text-left">Price</th>
                    <th class="p-4 text-left">Quantity</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($cart as $id => $item)
                <tr class="hover:bg-gray-700 transition duration-200">
                    <td class="p-4">
                        <img src="{{ $item['image_url'] ?? asset('images/placeholder.png') }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md shadow-md">
                    </td>
                    <td class="p-4 font-semibold">{{ $item['name'] }}</td>
                    <td class="p-4 text-green-400 font-medium">${{ number_format($item['price'], 2) }}</td>
                    <td class="p-4">{{ $item['quantity'] }}</td>
                    <td class="p-4 text-center">
                        <a href="{{ route('barbells.remove', $id) }}" class="inline-flex items-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md shadow transition text-white text-sm font-medium">
                            <i class="fas fa-trash mr-2"></i> Remove
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-400 italic">
                        🛍️ Your cart is empty. Start shopping now!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Cart Total + Checkout -->
    @if(count($cart) > 0)
    <div class="mt-10 max-w-6xl mx-auto flex justify-end">
        <div class="bg-gray-800 border border-gray-700 rounded-lg px-6 py-5 text-right shadow-md">
            <p class="text-lg font-semibold mb-4">
                Total:
                <span class="text-green-400">
                    ${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}
                </span>
            </p>
               <a href="{{ route('barbells.checkout') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md transition inline-flex items-center">
                  Proceed to Checkout
                </a>
        </div>
    </div>
    @endif

</main>

</body>
</html>
