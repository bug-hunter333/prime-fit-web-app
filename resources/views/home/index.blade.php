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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        .animate-pulse-custom {
            animation: pulse-custom 2s infinite;
        }

        @keyframes pulse-custom {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .navbar-sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .slide-up {
            transform: translateY(-100%);
        }

        .slide-down {
            transform: translateY(0);
        }

        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .category-tab {
            transition: all 0.3s ease;
        }

        .category-tab:hover {
            background-color: rgba(34, 197, 94, 0.9);
            color: white;
        }

        .category-tab.active {
            background-color: rgb(34, 197, 94);
            color: white;
        }

        .banner-overlay {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2d3748;
        }

        ::-webkit-scrollbar-thumb {
            background: #22c55e;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #16a34a;
        }
    </style>
</head>

<body class="bg-zinc-800 overflow-x-hidden">

    <!-- Navbar -->
    <nav class="bg-black bg-opacity-80 text-green-500 p-4 sticky top-0 z-50 shadow-md transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
        <div class="flex items-center">
        <a href="{{ route('index') }}">
            <b class="font-righteous text-4xl md:text-5xl font-extrabold text-green-500 hover:text-green-400 transition duration-300 transform hover:scale-105">
                PrimeFit
            </b>
        </a>

        </div>

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





    <!-- Hero Banner Section -->
    <div class="relative bg-cover bg-center h-[600px] flex items-center" style="background-image: url('{{ asset('images/new.jpg') }}');">
    <div class="banner-overlay absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-lg">
            <h1 class="text-6xl font-righteous font-extrabold text-white mb-4">
                ELEVATE YOUR<br>
                <span class="text-green-400">FITNESS</span> JOURNEY
            </h1>
            <p class="text-white text-xl mb-8">Premium equipment for exceptional results</p>
            <div class="flex space-x-4">
                <a href="#shop-now"
                   class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full font-bold transition duration-300 transform hover:scale-105">
                   SHOP NOW
                </a>
                <a href="#featured-products"
                   class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-black transition duration-300">
                   EXPLORE
                </a>
            </div>
        </div>
    </div>
</div>


    <!-- Current Promotions - New Section -->
    <div class="py-12 bg-gray-700">
        <div class="container mx-auto px-4">
            <h2 class="text-center text-3xl font-righteous font-bold text-white mb-8">Current Promotions</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Promo Card 1 -->
                <div class="bg-black rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="h-48 bg-gradient-to-r from-green-400 to-green-600 flex items-center justify-center">
                        <h3 class="text-4xl font-bold text-white">30% OFF</h3>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-green-400 text-xl font-bold mb-2">All Dumbbells</h4>
                        <p class="text-gray-300 mb-4">Limited time offer on premium quality dumbbells</p>
                        <a href="{{ route('dumbells.index') }}"
                            class="inline-block bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition duration-300">Shop
                            Now</a>
                    </div>
                </div>

                <!-- Promo Card 2 -->
                <div class="bg-black rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="h-48 bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center">
                        <h3 class="text-4xl font-bold text-white">BUY 1 GET 1</h3>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-green-400 text-xl font-bold mb-2">Yoga Mats</h4>
                        <p class="text-gray-300 mb-4">Buy one premium yoga mat and get one free</p>
                          <a href="{{ route('yoga.index') }}"
                            class="inline-block bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition duration-300">Shop
                            Now</a>
                    </div>
                </div>

                <!-- Promo Card 3 -->
                <div class="bg-black rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="h-48 bg-gradient-to-r from-yellow-400 to-orange-500 flex items-center justify-center">
                        <h3 class="text-4xl font-bold text-white">FREE SHIPPING</h3>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-green-400 text-xl font-bold mb-2">Orders Over $100</h4>
                        <p class="text-gray-300 mb-4">Get free shipping on all orders over $100</p>
                        <a href="#shop-now"
                            class="inline-block bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition duration-300">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript inside script tag or external file
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".category-tab");
            const products = document.querySelectorAll(".product-card");

            const handleFilter = (category) => {
                products.forEach((product) => {
                    const productCategory = product.dataset.category;
                    product.style.display =
                        category === "all" || productCategory === category
                            ? "block"
                            : "none";
                });
            };

            const clearActiveClasses = () => {
                tabs.forEach((tab) => tab.classList.remove("bg-green-500", "text-white"));
            };

            tabs.forEach((tab) => {
                tab.addEventListener("click", () => {
                    const selectedCategory = tab.dataset.category;
                    clearActiveClasses();
                    tab.classList.add("bg-green-500", "text-white");
                    handleFilter(selectedCategory);
                });
            });

            // Initial display
            handleFilter("all");
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-900 text-white font-sans">

        <!-- Featured Products Section -->
        <div id="featured-products" class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-center text-green-500 text-4xl font-bold mb-2">Featured Products</h2>
                <p class="text-center text-gray-400 mb-12">Handpicked by our fitness experts</p>

                <!-- Category Tabs -->
                <div class="flex justify-center mb-8 overflow-x-auto">
                    <div class="inline-flex bg-gray-700 rounded-full p-1">
                        <button class="category-tab bg-green-500 text-white px-6 py-2 rounded-full text-sm font-medium"
                            data-category="all">All</button>
                        <button class="category-tab px-6 py-2 rounded-full text-sm font-medium"
                            data-category="strength">Strength</button>
                        <button class="category-tab px-6 py-2 rounded-full text-sm font-medium"
                            data-category="cardio">Cardio</button>
                        <button class="category-tab px-6 py-2 rounded-full text-sm font-medium"
                            data-category="yoga">Yoga</button>
                        <button class="category-tab px-6 py-2 rounded-full text-sm font-medium"
                            data-category="accessories">Accessories</button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 product-container">
                    <!-- Product Card 1-->
    <div class="product-card bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-green-500/20" data-category="strength">
    <div class="relative">
        <img src="{{ asset('images/dumbells.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
        
        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">
            -15%
        </div>
        
        <button class="absolute top-2 left-2 bg-white rounded-full p-2 hover:bg-gray-200 transition-all duration-300">
            <i class="far fa-heart text-gray-700"></i>
        </button>
    </div>
    
    <div class="p-6">
        <div class="flex justify-between items-center mb-3">
            <span class="text-xs text-gray-400">Strength Training</span>
            <div class="flex">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star-half-alt text-yellow-400"></i>
                <span class="text-xs text-gray-400 ml-1">(42)</span>
            </div>
        </div>
        
        <h3 class="text-white text-lg font-bold mb-2">Premium Dumbbells Set</h3>
        
        <div class="flex justify-between items-center">
            <div>
                <span class="text-gray-400 line-through text-sm">$199.99</span>
                <span class="text-green-400 font-bold text-xl ml-2">$169.99</span>
            </div>
          <a href="{{ route('dumbells.index') }}">
            <button class="bg-black hover:bg-green-500 text-white px-3 py-1 rounded-full transition duration-300 flex items-center gap-2">
             <i class="fas fa-shopping-cart text-sm"></i>
             <span>Shop</span>
            </button>
            </a>
        </div>
    </div>
</div>

                    <!-- Product card 2 -->
                    <div class="product-card bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-green-500/20"
                        data-category="yoga">
                        <div class="relative">
                            <img src="{{ asset('images/mat.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                            <div
                                class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                                NEW</div>
                            <button
                                class="absolute top-2 left-2 bg-white rounded-full p-2 hover:bg-gray-200 transition-all duration-300">
                                <i class="far fa-heart text-gray-700"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs text-gray-400">Yoga Equipment</span>
                                <div class="flex">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span class="text-xs text-gray-400 ml-1">(28)</span>
                                </div>
                            </div>
                            <h3 class="text-white text-lg font-bold mb-2">PrimeFit Yoga Mat</h3>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-green-400 font-bold text-xl">$49.99</span>
                                </div>
                                <a href="{{ route('yoga.index') }}">
            <button class="bg-black hover:bg-green-500 text-white px-3 py-1 rounded-full transition duration-300 flex items-center gap-2">
             <i class="fas fa-shopping-cart text-sm"></i>
             <span>Shop</span>
            </button>
            </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product card 3 -->

                    <div class="product-card bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-green-500/20"
                        data-category="strength">
                        <div class="relative">
                           <img src="{{ asset('images/rack.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                            <div
                                class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                HOT</div>
                            <button
                                class="absolute top-2 left-2 bg-white rounded-full p-2 hover:bg-gray-200 transition-all duration-300">
                                <i class="far fa-heart text-gray-700"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs text-gray-400">Home Gym</span>
                                <div class="flex">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="far fa-star text-yellow-400"></i>
                                    <span class="text-xs text-gray-400 ml-1">(16)</span>
                                </div>
                            </div>
                            <h3 class="text-white text-lg font-bold mb-2">Power Rack with Pull-up Bar</h3>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-green-400 font-bold text-xl">$599.99</span>
                                </div>
                               <a href="{{ route('racks.index') }}">
            <button class="bg-black hover:bg-green-500 text-white px-3 py-1 rounded-full transition duration-300 flex items-center gap-2">
             <i class="fas fa-shopping-cart text-sm"></i>
             <span>Shop</span>
            </button>
            </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="product-card bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-green-500/20"
                        data-category="accessories">
                        <div class="relative">
                            <img src="{{ asset('images/gloves.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                            <button
                                class="absolute top-2 left-2 bg-white rounded-full p-2 hover:bg-gray-200 transition-all duration-300">
                                <i class="far fa-heart text-gray-700"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs text-gray-400">Accessories</span>
                                <div class="flex">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400"></i>
                                    <i class="far fa-star text-yellow-400"></i>
                                    <span class="text-xs text-gray-400 ml-1">(37)</span>
                                </div>
                            </div>
                            <h3 class="text-white text-lg font-bold mb-2">Pro Weightlifting Gloves</h3>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-green-400 font-bold text-xl">$29.99</span>
                                </div>
                               <a href="{{ route('gloves.index') }}">
            <button class="bg-black hover:bg-green-500 text-white px-3 py-1 rounded-full transition duration-300 flex items-center gap-2">
             <i class="fas fa-shopping-cart text-sm"></i>
             <span>Shop</span>
            </button>
            </a>
                            </div>
                        </div>
                    </div>

                 

                    <!-- Product Card 6 -->
                    <div class="product-card bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-green-500/20"
                        data-category="accessories">
                        <div class="relative">
                        <img src="{{ asset('images/resistance.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                            <button
                                class="absolute top-2 left-2 bg-white rounded-full p-2 hover:bg-gray-200 transition-all duration-300">
                                <i class="far fa-heart text-gray-700"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs text-gray-400">Accessories</span>
                                <div class="flex">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="far fa-star text-yellow-400"></i>
                                    <span class="text-xs text-gray-400 ml-1">(24)</span>
                                </div>
                            </div>
                            <h3 class="text-white text-lg font-bold mb-2">Resistance Bands Set</h3>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-green-400 font-bold text-xl">$39.99</span>
                                </div>
                                <button
                                    class="bg-black hover:bg-green-500 text-white px-3 py-1 rounded-full transition duration-300 flex items-center gap-2">
                                    <i class="fas fa-shopping-cart text-sm"></i>
                                    <span>Shop</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>



        <!-- PrimeFit Edition Products Section with Animation -->
        <div id="shop-now" class="py-20">
            <div class="container mx-auto px-4">
                <h2 class="text-center text-4xl font-righteous font-bold text-white mb-2">PrimeFit Exclusive</h2>
                <p class="text-center text-gray-400 mb-12">Premium products designed by our fitness experts</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Product 1 -->
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-2xl bg-gradient-to-br from-gray-900 to-black">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-black opacity-70 group-hover:opacity-90 transition-opacity duration-300">
                        </div>
                       <img src="{{ asset('images/dumbells.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 flex flex-col justify-end p-8">
                            <div
                                class="transform translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <span
                                    class="inline-block bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4">EXCLUSIVE</span>
                                <h3 class="text-white text-3xl font-bold mb-3">PrimeFit Neon Dumbbells</h3>
                                <p class="text-gray-300 mb-6">Revolutionary design with ergonomic grip and premium
                                    materials for optimal performance.</p>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-green-400 font-bold text-2xl">$199.99</span>
                                        <span class="ml-2 text-gray-400">/ set</span>
                                    </div>
                                    <a href="{{ route('dumbells.index') }}"
                                        class="flex items-center space-x-2 bg-white text-black hover:bg-green-500 hover:text-white px-6 py-3 rounded-full font-bold transition-all duration-300">
                                        <span>Shop Now</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-2xl bg-gradient-to-br from-gray-900 to-black">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-black opacity-70 group-hover:opacity-90 transition-opacity duration-300">
                        </div>
                          <img src="{{ asset('images/Barbell.png') }}" alt="Prime Dumbbells" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 flex flex-col justify-end p-8">
                            <div
                                class="transform translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                <span
                                    class="inline-block bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4">EXCLUSIVE</span>
                                <h3 class="text-white text-3xl font-bold mb-3">PrimeFit Elite Barbell</h3>
                                <p class="text-gray-300 mb-6">Professional-grade Olympic barbell with precision knurling
                                    and superior durability.</p>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-green-400 font-bold text-2xl">$249.99</span>
                                    </div>
                                      <a href="{{ route('barbells.index') }}"
                                        class="flex items-center space-x-2 bg-white text-black hover:bg-green-500 hover:text-white px-6 py-3 rounded-full font-bold transition-all duration-300">
                                        <span>Shop Now</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Section - New Addition -->
        <div class="py-16 bg-gray-700">
            <div class="container mx-auto px-4">
                <h2 class="text-center text-4xl font-righteous font-bold text-white mb-2">What Our Customers Say</h2>
                <p class="text-center text-gray-300 mb-12">Real feedback from fitness enthusiasts</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="testimonials-container">
                    <!-- Testimonial 1 -->
                    <div
                        class="bg-gray-800 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div
                                class="bg-green-500 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                J
                            </div>
                            <div class="ml-4">
                                <h4 class="text-white font-bold">James Wilson</h4>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"The quality of PrimeFit equipment is unmatched. I've transformed my
                            home gym with their products and couldn't be happier with my results!"</p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="bg-gray-800 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div
                                class="bg-purple-500 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                S
                            </div>
                            <div class="ml-4">
                                <h4 class="text-white font-bold">Sarah Johnson</h4>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"As a personal trainer, I recommend PrimeFit to all my clients. Their
                            yoga mats and resistance bands have exceptional durability and comfort."</p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="bg-gray-800 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div
                                class="bg-blue-500 w-12 h-12 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                M
                            </div>
                            <div class="ml-4">
                                <h4 class="text-white font-bold">Michael Rodriguez</h4>
                                <div class="flex text-yellow-400 mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-300">"The power rack I purchased from PrimeFit completely changed my home
                            gym setup. Fast shipping, easy assembly, and rock-solid construction."</p>
                    </div>
                </div>

                <!-- Testimonial Navigation Dots -->
                <div class="flex justify-center mt-8 md:hidden">
                    <button class="w-3 h-3 rounded-full bg-green-500 mx-1" data-testimonial="0"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-400 mx-1" data-testimonial="1"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-400 mx-1" data-testimonial="2"></button>
                </div>
            </div>
        </div>

        <!-- Newsletter Section - New Addition -->
        <div class="py-16 bg-black">
            <div class="container mx-auto px-4">
                <div
                    class="max-w-3xl mx-auto bg-gradient-to-r from-green-500 to-green-700 rounded-2xl overflow-hidden shadow-2xl">
                    <div class="md:flex">
                        <div class="p-10 md:w-3/5">
                            <h2 class="text-3xl font-bold text-white mb-4">Join the PrimeFit Community</h2>
                            <p class="text-white/80 mb-6">Subscribe to our newsletter for exclusive deals, fitness tips,
                                and new product announcements.</p>

                            <form class="space-y-4">
                                <div class="flex flex-col md:flex-row gap-2">
                                    <input type="email" placeholder="Your email address"
                                        class="px-4 py-3 rounded-lg focus:outline-none flex-1">
                                    <button type="submit"
                                        class="bg-black text-white font-bold px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-300">
                                        Subscribe
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="privacy" class="mr-2">
                                    <label for="privacy" class="text-sm text-white/80">I agree to receive emails from
                                        PrimeFit</label>
                                </div>
                            </form>
                        </div>
                        <div class="hidden md:block md:w-2/5 bg-cover bg-center"
                            style="background-image: url('https://cdn.pixabay.com/photo/2017/08/07/14/02/man-2604149_640.jpg')">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Shipping Deals Section -->
        <div class="bg-gray-500 py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-center text-black text-2xl font-bold mb-12">Why Shop With Us</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div
                        class="bg-white rounded-xl p-6 text-center transform transition-transform hover:-translate-y-2 duration-300 shadow-lg">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-500 rounded-full">
                            <img src="{{ asset('images/fast.png') }}" alt="Fast Delivery" class="w-10 h-10">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Fast Delivery</h3>
                        <p class="text-gray-600">Get your orders within 2-4 business days</p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="bg-white rounded-xl p-6 text-center transform transition-transform hover:-translate-y-2 duration-300 shadow-lg">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-500 rounded-full">
                            <img src="{{ asset('images/free.png') }}" alt="Free Shipping" class="w-10 h-10">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Free Shipping</h3>
                        <p class="text-gray-600">On all orders over $100</p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="bg-white rounded-xl p-6 text-center transform transition-transform hover:-translate-y-2 duration-300 shadow-lg">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-500 rounded-full">
                            <img src="{{ asset('images/world.png') }}" alt="Global Shipping" class="w-10 h-10">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Worldwide Delivery</h3>
                        <p class="text-gray-600">We ship to over 50 countries</p>
                    </div>

                    <!-- Feature 4 -->
                    <div
                        class="bg-white rounded-xl p-6 text-center transform transition-transform hover:-translate-y-2 duration-300 shadow-lg">
                        <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-500 rounded-full">
                            <i class="fas fa-undo text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Easy Returns</h3>
                        <p class="text-gray-600">30-day money-back guarantee</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

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