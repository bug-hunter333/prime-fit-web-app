<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeFit - Fitness Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Righteous&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
        <script>
        // Configure custom fonts
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'righteous': ['Righteous', 'cursive'],
                    },
                },
            },
        }
    </script>
    


<script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'righteous': ['Righteous', 'cursive'],
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                    }
                },
            },
        }
    </script>
    <!-- Add Google Font for Righteous -->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Add heroicons for mobile menu icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-black via-gray-900 to-green-900">
    <!-- Dynamic Navbar -->
    <div x-data="{ open: false, activeCategory: null }">
        <!-- Main Navbar -->
    <!-- Navbar -->
    <nav class="bg-black bg-opacity-80 text-green-500 p-4 sticky top-0 z-50 shadow-md transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
             <a href="{{ route('index') }}">
            <b class="font-righteous text-4xl md:text-5xl font-extrabold text-green-500 hover:text-green-400 transition duration-300 transform hover:scale-105">
                PrimeFit
            </b>
        </a>
        <!-- Mobile menu button (optional) -->
        <div class="md:hidden">
            <button class="text-black hover:text-green-500 focus:outline-none transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-6">
            <!-- Auth Logic -->
            @auth
                <!-- Show User Name with Dropdown -->
                <div class="relative group">
                    <button
                        class="bg-gray-900 text-green-500 font-semibold px-4 py-2 rounded hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-105 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd" />
                        </svg>
                        {{ Auth::user()->name }}
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute hidden group-hover:block bg-gray-800 text-white mt-2 rounded shadow-lg py-2 w-40 z-50">
                        <a href="{{ route('profile.show') }}"
                           class="block px-4 py-2 hover:bg-green-600 transition">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-red-600 transition">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Guest Links -->
                <a href="{{ route('login') }}"
                   class="bg-gray-900 text-green-500 font-semibold px-4 py-2 rounded hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-105 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd" />
                    </svg>
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="bg-gray-900 text-green-500 font-semibold px-4 py-2 rounded hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-105 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24"
                         fill="currentColor">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                    Register
                </a>
            @endauth

            <!-- Cart Button -->
   <a href="{{ route('cart.display') }}"
               class="bg-gray-900 text-green-500 font-semibold px-4 py-2 rounded hover:bg-green-600 hover:text-white transition duration-300 transform hover:scale-105 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                Cart
            </a>
        </div>
    </div>
</nav>

<!-- Categories Section -->
<div class="hidden md:block bg-black text-white p-4">
    <div class="flex justify-around text-white text-sm font-righteous font-bold max-w-7xl mx-auto">
        <a href="{{ route('dumbells.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-dumbbell"></i> Dumbbells
        </a>
        <a href="{{ route('barbells.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-weight"></i> Barbells and Weight Plates
        </a>
        <a href="{{ route('gloves.index') }}" class="text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-mitten"></i> Weightlifting Gloves
        </a>
        <a href="{{ route('yoga.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-spa"></i> Yoga Mats
        </a>
        <a href="{{ route('racks.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-border-all"></i> Rigs & Racks
        </a>
    </div>
</div>
    
    <!-- Product Section -->
    <main class="p-6 max-w-7xl mx-auto animate-fade-in">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Product Image -->
            <img src="{{ $glove->image_url ?? asset('assets/dumbell_10_kg-removebg-preview.png') }}"
                 alt="{{ $glove->name }}"
                 class="rounded-xl shadow-lg w-full object-contain max-h-[500px]" />

            <!-- Product Info -->
            <div>
                <p class="text-sm text-gray-400 mb-1">Product ID: {{ $glove->id }}</p>
                <h1 class="text-4xl text-green-500 font-bold mb-2">{{ $glove->name }}</h1>
                <p class="text-3xl text-green-400 font-bold mb-4">${{ number_format($glove->price, 2) }}</p>

                @if($glove->weight > 0)
                    <p class="mb-2"><span class="text-green-400">Weight: {{ $glove->weight }}kg</span></p>
                @endif

                <p class="mb-4">
                    <span class="text-green-400">Stock:</span> 
                    <span class="font-semibold text-white">
                        {{ $glove->quantity }} available
                        @if($glove->quantity == 0)
                            <span class="text-red-400 ml-2">(Out of Stock)</span>
                        @elseif($glove->quantity < 5)
                            <span class="text-yellow-400 ml-2">(Low Stock)</span>
                        @endif
                    </span>
                </p>

                <!-- Quantity -->
                <div class="mb-4">
                    <label for="quantity" class="block text-sm text-gray-300">Quantity:</label>
                    <input id="quantity" type="number" name="quantity" min="1" max="{{ $glove->quantity }}"
                           value="1" class="w-24 px-3 py-2 bg-gray-700 rounded-md text-white focus:outline-none"
                           @if($glove->quantity == 0) disabled @endif>
                </div>

<!-- Buttons -->
<div class="flex flex-wrap gap-4">

    <!-- Add to Cart Button -->
    <form action="{{ route('gloves.add') }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="product_id" value="{{ $glove->id }}">
        <input type="hidden" name="quantity" value="1">

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-bold transition
                       disabled:bg-gray-500 disabled:cursor-not-allowed"
                @if($glove->quantity == 0) disabled @endif>
            {{ $glove->quantity == 0 ? 'Out of Stock' : 'Add to Cart' }}
        </button>
    </form>

    {{-- <!-- Buy Now Button -->
    <form action="{{ route('gloves.checkout') }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="product_id" value="{{ $glove->id }}">
        <input type="hidden" name="quantity" value="1">

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-bold transition
                       disabled:bg-gray-500 disabled:cursor-not-allowed"
                @if($glove->quantity == 0) disabled @endif>
            {{ $glove->quantity == 0 ? 'Out of Stock' : 'Buy Now' }}
        </button>
    </form> --}}

</div>

            </div>
        </div>

<!-- Tabs -->
<div class="mt-12">
  <div class="flex space-x-6 border-b border-gray-700 pb-2">
    <button class="tab-btn relative pb-2 text-gray-300 hover:text-green-400 transition duration-300 ease-in-out font-semibold border-b-2 border-transparent focus:outline-none" data-tab="specs">
      Gear Specs
    </button>
    <button class="tab-btn relative pb-2 text-gray-300 hover:text-green-400 transition duration-300 ease-in-out font-semibold border-b-2 border-transparent focus:outline-none" data-tab="faqs">
      FAQ's
    </button>
  </div>

  <div id="specs" class="tab-content mt-6 hidden animate-fade-in">
    <div class="bg-gray-800 p-5 rounded-lg shadow-lg transition duration-300 ease-in-out">
      <h4 class="font-bold mb-3 text-green-400 text-lg">Specifications</h4>
      <ul class="space-y-2 text-gray-300">
        <li><span class="text-gray-400">ID:</span> {{ $glove->id }}</li>
        <li><span class="text-gray-400">Name:</span> {{ $glove->name }}</li>
        <li><span class="text-gray-400">Price:</span> ${{ number_format($glove->price, 2) }}</li>
        <li><span class="text-gray-400">Weight:</span> {{ $glove->weight }}kg</li>
        <li><span class="text-gray-400">Stock:</span> {{ $glove->quantity }}</li>
        <li>
          <span class="text-gray-400">Status:</span> 
          <span class="{{ $glove->quantity > 0 ? 'text-green-400' : 'text-red-400' }}">
            {{ $glove->quantity > 0 ? 'In Stock' : 'Out of Stock' }}
          </span>
        </li>
      </ul>
    </div>
  </div>

  <div id="faqs" class="tab-content mt-6 hidden animate-fade-in">
    <div class="bg-gray-800 p-5 rounded-lg shadow-lg transition duration-300 ease-in-out">
      <h4 class="font-bold mb-3 text-green-400 text-lg">FAQ</h4>
      <p class="text-gray-300">Common questions about durability, care, and usage.</p>
      @if(!empty($glove->faq))
      <p class="mt-3 text-gray-400 italic">{{ $glove->faq }}</p>
      @endif
    </div>
  </div>
</div>

<!-- Reviews -->
<section class="mt-12">
  <h3 class="text-2xl font-bold mb-4 text-green-400">Customer Reviews</h3>
  <div class="bg-gray-800 p-5 rounded-lg shadow-lg">
    <div class="flex items-center gap-3 text-yellow-400 mb-1">⭐⭐⭐⭐⭐ <span class="text-sm text-gray-400">Nov 2022</span></div>
    <h4 class="font-bold text-gray-200">Meets expectations</h4>
    <p class="text-gray-300">Bought this about 2 months ago and is definitely a staple in my weight loss journey.</p>
    <div class="text-sm text-gray-400 mt-3">
      <span class="text-green-400">✔ Yes</span>
      <span class="ml-4">Helpful?
        <button class="text-green-300 hover:text-green-200 ml-1 transition">Yes</button>
        <button class="text-red-300 hover:text-red-200 ml-2 transition">No</button>
      </span>
    </div>
  </div>
</section>

<footer class="bg-black text-white py-10 mt-12">
  <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 px-6">
    <!-- About Us -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">About Us</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">The Prime Way</a></li>
        <li><a href="#" class="hover:underline">Jobs</a></li>
        <li><a href="#" class="hover:underline">#yourPrime</a></li>
      </ul>
    </div>

    <!-- Shopping -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">Shopping</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">Retail Store</a></li>
        <li><a href="#" class="hover:underline">Gift Cards</a></li>
        <li><a href="#" class="hover:underline">Brands</a></li>
        <li><a href="#" class="hover:underline">Gift Registry</a></li>
      </ul>
    </div>

    <!-- Customer Service -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">Customer Service</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">Custom Quotes</a></li>
        <li><a href="#" class="hover:underline">Checkout FAQ</a></li>
        <li><a href="#" class="hover:underline">Track Your Order</a></li>
        <li><a href="#" class="hover:underline">Returns & Cancellations</a></li>
        <li><a href="#" class="hover:underline">Shipping</a></li>
      </ul>
    </div>

    <!-- Policies -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">Policies & Notices</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">Recall Information</a></li>
        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
        <li><a href="#" class="hover:underline">Terms of Use</a></li>
        <li><a href="#" class="hover:underline">Accessibility</a></li>
      </ul>
    </div>

    <!-- Other Sites -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">Other Websites</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">PrimeFit Invitational</a></li>
        <li><a href="#" class="hover:underline">Prime Challenges</a></li>
        <li><a href="#" class="hover:underline">Prime Athletes</a></li>
        <li><a href="#" class="hover:underline">The PrimeFit Blog</a></li>
        <li><a href="#" class="hover:underline">The PrimeFit Gym</a></li>
        <li><a href="#" class="hover:underline">Prime Equipped Events</a></li>
        <li><a href="#" class="hover:underline">Garage Gyms</a></li>
        <li><a href="#" class="hover:underline">The Index</a></li>
        <li><a href="#" class="hover:underline">Titans</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div>
      <h3 class="font-bold mb-4 uppercase text-sm text-gray-400">Contact Us</h3>
      <p class="text-sm">Phone: (614) 358-6190</p>
      <p class="text-sm">Fax: (614) 340-7206</p>
      <p class="text-sm">PrimeFit HQ</p>
      <p class="text-sm">5th Ave, Colombo 07</p>

      <div class="mt-4 flex space-x-4 text-lg">
        <a href="#" class="hover:text-gray-400"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-youtube"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-tiktok"></i></a>
      </div>
    </div>
  </div>

  <!-- Bottom -->
  <div class="text-center mt-10 text-sm text-gray-400 border-t border-gray-700 pt-6">
    &copy; {{ now()->year }} PrimeFit. All rights reserved.
  </div>
</footer>


<!-- Script -->
<script>
  // Tab Switching with Active Highlight
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetId = button.dataset.tab;

      // Update active tab
      tabButtons.forEach(btn => btn.classList.remove('text-green-400', 'border-green-400'));
      button.classList.add('text-green-400', 'border-green-400');

      // Show content
      tabContents.forEach(content => {
        content.classList.add('hidden');
        content.classList.remove('fade-in');
      });

      const targetContent = document.getElementById(targetId);
      targetContent.classList.remove('hidden');
      targetContent.classList.add('fade-in');
    });
  });
</script>

<!-- Animation -->
<style>
  .fade-in {
    animation: fadeIn 0.5s ease-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

</body>
</html>
