<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - PrimeFit</title>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
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
</head>
<body class="min-h-screen bg-gradient-to-br from-black via-gray-900 to-green-900">
    
    <!-- Header -->
    <div class="bg-black bg-opacity-80 text-white p-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('index') }}">
                <b class="font-righteous text-4xl font-extrabold text-green-500">PrimeFit</b>
            </a>
            <h1 class="text-xl font-bold">Checkout</h1>
        </div>
    </div>

    <div class="container mx-auto p-6 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Order Summary -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h2 class="text-2xl font-bold text-green-400 mb-6">Order Summary</h2>
                
                <!-- Product Item -->
                <div class="flex items-center gap-4 bg-gray-700 rounded-lg p-4 mb-4">
                    <img src="{{ $checkoutItem['image_url'] ?? asset('assets/dumbell_10_kg-removebg-preview.png') }}" 
                         alt="{{ $checkoutItem['name'] }}" 
                         class="w-20 h-20 object-contain rounded">
                    
                    <div class="flex-1">
                        <h3 class="text-white font-semibold">{{ $checkoutItem['name'] }}</h3>
                        <p class="text-gray-300">Weight: {{ $checkoutItem['weight'] }}kg</p>
                        <p class="text-gray-300">Quantity: {{ $checkoutItem['quantity'] }}</p>
                        <p class="text-green-400 font-bold">${{ number_format($checkoutItem['price'], 2) }} each</p>
                    </div>
                    
                    <div class="text-right">
                        <p class="text-white font-bold text-lg">
                            ${{ number_format($checkoutItem['subtotal'], 2) }}
                        </p>
                    </div>
                </div>

                <!-- Order Totals -->
                <div class="border-t border-gray-600 pt-4 space-y-2">
                    <div class="flex justify-between text-gray-300">
                        <span>Subtotal:</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span>Shipping:</span>
                        <span>
                            @if($shipping == 0)
                                <span class="text-green-400">Free</span>
                            @else
                                ${{ number_format($shipping, 2) }}
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span>Tax (8%):</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                    <hr class="border-gray-600">
                    <div class="flex justify-between text-white font-bold text-lg">
                        <span>Total:</span>
                        <span class="text-green-400">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h2 class="text-2xl font-bold text-green-400 mb-6">Shipping Information</h2>
                
                <form action="{{ route('checkout.process') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Customer Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-300 mb-2">Full Name *</label>
                            <input type="text" name="name" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                                   value="{{ old('name', auth()->user()->name ?? '') }}">
                            @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-300 mb-2">Email *</label>
                            <input type="email" name="email" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                                   value="{{ old('email', auth()->user()->email ?? '') }}">
                            @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Phone Number *</label>
                        <input type="tel" name="phone" required 
                               class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                               value="{{ old('phone') }}">
                        @error('phone') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Address *</label>
                        <textarea name="address" required rows="3" 
                                  class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                                  placeholder="Street address, apartment, suite, etc.">{{ old('address') }}</textarea>
                        @error('address') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-300 mb-2">City *</label>
                            <input type="text" name="city" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                                   value="{{ old('city') }}">
                            @error('city') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-300 mb-2">ZIP Code *</label>
                            <input type="text" name="zip_code" required 
                                   class="w-full p-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                                   value="{{ old('zip_code') }}">
                            @error('zip_code') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="mt-6">
                        <h3 class="text-xl font-bold text-green-400 mb-4">Payment Method</h3>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="credit_card" 
                                       class="text-green-500 focus:ring-green-500" checked>
                                <span class="ml-2 text-white">Credit Card</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="paypal" 
                                       class="text-green-500 focus:ring-green-500">
                                <span class="ml-2 text-white">PayPal</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payment_method" value="cash_on_delivery" 
                                       class="text-green-500 focus:ring-green-500">
                                <span class="ml-2 text-white">Cash on Delivery</span>
                            </label>
                        </div>
                        @error('payment_method') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit" 
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            Place Order - ${{ number_format($total, 2) }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('error'))
        <div class="fixed top-4 right-4 bg-red-600 text-white p-4 rounded shadow-lg">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>