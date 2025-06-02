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
        <a href="{{ route('dumbells.index') }}" class=text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-dumbbell"></i> Dumbbells
        </a>
        <a href="{{ route('barbells.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
            <i class="fas fa-weight"></i> Barbells and Weight Plates
        </a>
        <a href="{{ route('gloves.index') }}" class="hover:text-green-500 transition duration-300 flex items-center gap-2">
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


<div class="py-4">
    <p class="text-white font-righteous font-extrabold text-4xl m-6">Dumbbells</p>

    <div class="py-10 bg-gray-950 min-h-screen">
    <div class="flex flex-wrap gap-8 justify-center px-6">
        @foreach ($dumbells as $dumbell)
            <div class="max-w-xs bg-black rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="overflow-hidden rounded-t-2xl">
                    <img class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110" 
                         src="{{ $dumbell->image_url ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                         alt="{{ $dumbell->name }}">
                </div>
                <div class="p-5 space-y-3">
                    <h5 class="text-lg font-bold text-green-500 truncate" title="{{ $dumbell->name }}">
                        {{ $dumbell->name }}
                    </h5>
                    <p class="text-sm text-green-400 line-clamp-3">
                        {{ $dumbell->description ?? 'No description available.' }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-green-400 transition-colors duration-200 group-hover:text-green-300">
                            ${{ number_format($dumbell->price ?? 0, 2) }}
                        </span>
                        <a href="{{ route('dumbells.show', $dumbell->id) }}"
                         class="px-4 py-2 bg-gray-700 text-green-400 text-xs font-bold rounded-lg hover:bg-white hover:text-black transition-colors duration-200">
                         SHOP NOW
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





        
    </div>
</div>
</div>





<!-- //description about dumbells -->

<div class="py-2">
    <script>
        // JavaScript to toggle FAQ answer visibility
        function toggleFAQ(index) {
          const answer = document.getElementById(`answer-${index}`);
          const icon = document.getElementById(`icon-${index}`);
          const isVisible = answer.classList.contains('hidden');
          
          if (isVisible) {
            answer.classList.remove('hidden');
            icon.textContent = '-'; // Change icon to minus
          } else {
            answer.classList.add('hidden');
            icon.textContent = '+'; // Change icon to plus
          }
        }
      </script>
    </head>
      <!-- Dumbbells Description Section -->
     <section class="py-10 bg-black">
  <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center md:items-start gap-8">
    <!-- Text Content -->
    <div class="md:w-1/2">
      <h2 class="text-2xl font-extrabold text-green-500 font-righteous mb-4">
        Prime Fit Dumbbells: The Ultimate Workout Companion
      </h2>
      <p class="text-1xl text-white font-righteous font-semibold">
        PrimeFit Dumbbells are premium-quality weights designed for effective strength training and muscle building.
        With a durable build, ergonomic grips, and a sleek design, they provide comfort and stability for a variety of exercises.
        Ideal for home and gym workouts, PrimeFit Dumbbells help enhance fitness and performance.
      </p>
      <br>
      <p class="text-1xl text-white font-righteous font-semibold">
        Whether you're performing bicep curls, shoulder presses, or lunges, dumbbells provide an effective way to achieve your fitness goals.
        Choose adjustable dumbbells for flexibility or fixed dumbbells for a straightforward option.
      </p>
    </div>

    <!-- Image Card -->
    <div class="md:w-1/2">
      <div class="rounded-xl overflow-hidden shadow-lg">
       <img src="{{ asset('images/dumbells.png') }}" alt="Prime Fit Dumbbell" class="w-full h-auto object-cover">

      </div>
    </div>
  </div>
</section>

    
      <!-- FAQ Section -->
      <section class="py-10 bg-gray-300">
        <div class="max-w-4xl mx-auto px-4">
          <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
          
          <!-- FAQ 1 -->
          <div class="mb-6">
            <div class="flex items-center justify-between cursor-pointer" onclick="toggleFAQ(1)">
              <h3 class="text-lg font-semibold text-gray-800">
                1. What are the benefits of using dumbbells?
              </h3>
              <span id="icon-1" class="text-xl text-gray-600">+</span>
            </div>
            <p id="answer-1" class="text-gray-700 mt-2 hidden">
              Dumbbells help improve strength, flexibility, and balance. They are versatile and can target various muscle groups, making them ideal for both full-body workouts and isolation exercises.
            </p>
          </div>
    
          <!-- FAQ 2 -->
          <div class="mb-6">
            <div class="flex items-center justify-between cursor-pointer" onclick="toggleFAQ(2)">
              <h3 class="text-lg font-semibold text-gray-800">
                2. How do I choose the right weight for my dumbbells?
              </h3>
              <span id="icon-2" class="text-xl text-gray-600">+</span>
            </div>
            <p id="answer-2" class="text-gray-700 mt-2 hidden">
              Start with a weight that challenges you but allows you to maintain proper form. Beginners can opt for lighter weights (5–10 lbs), while more experienced users can choose heavier options.
            </p>
          </div>
    
          <!-- FAQ 3 -->
          <div class="mb-6">
            <div class="flex items-center justify-between cursor-pointer" onclick="toggleFAQ(3)">
              <h3 class="text-lg font-semibold text-gray-800">
                3. Are adjustable dumbbells better than fixed ones?
              </h3>
              <span id="icon-3" class="text-xl text-gray-600">+</span>
            </div>
            <p id="answer-3" class="text-gray-700 mt-2 hidden">
              Adjustable dumbbells are space-saving and versatile, allowing you to change weights easily. Fixed dumbbells, however, are more durable and straightforward for quick workouts.
            </p>
          </div>
        </div>
      </section>

</div>



<footer class="bg-black text-white py-10">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-6 gap-8 px-4">
    <!-- About Us -->
    <div>
      <h3 class="font-bold mb-4">ABOUT US</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">The Prime Way</a></li>
        <li><a href="#" class="hover:underline">Jobs</a></li>
        <li><a href="#" class="hover:underline">#yourPrime</a></li>
      </ul>
    </div>

    <!-- Shopping -->
    <div>
      <h3 class="font-bold mb-4">SHOPPING</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Retail Store</a></li>
        <li><a href="#" class="hover:underline">Gift Cards</a></li>
        <li><a href="#" class="hover:underline">Brands</a></li>
        <li><a href="#" class="hover:underline">Gift Registry</a></li>
      </ul>
    </div>

    <!-- Customer Service -->
    <div>
      <h3 class="font-bold mb-4">CUSTOMER SERVICE</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Custom Quotes</a></li>
        <li><a href="#" class="hover:underline">Checkout FAQ</a></li>
        <li><a href="#" class="hover:underline">Track Your Order</a></li>
        <li><a href="#" class="hover:underline">Returns & Cancellations</a></li>
        <li><a href="#" class="hover:underline">Shipping</a></li>
      </ul>
    </div>

    <!-- Policies & Notices -->
    <div>
      <h3 class="font-bold mb-4">POLICIES & NOTICES</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Recall Information</a></li>
        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
        <li><a href="#" class="hover:underline">Terms of Use</a></li>
        <li><a href="#" class="hover:underline">Accessibility</a></li>
      </ul>
    </div>

    <!-- Other Websites -->
    <div>
      <h3 class="font-bold mb-4">OTHER WEBSITES</h3>
      <ul class="space-y-2">
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

    <!-- Contact & Connect -->
    <div>
      <h3 class="font-bold mb-4">CONTACT US</h3>
      <p>(614) 358-6190</p>
      <p>Fax: (614) 340-7206</p>
      <p>PrimeFit HQ</p>
      <p> 5th Ave.</p>
      <p>Colombo 07.</p>

      <div class="mt-4 flex space-x-4">
        <a href="#" class="hover:text-gray-400"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-youtube"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-gray-400"><i class="fab fa-tiktok"></i></a>
      </div>

    </div>
  </div>
</footer>





</body>

</html>