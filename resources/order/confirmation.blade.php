<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - PrimeFit</title>
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
            <h1 class="text-xl font-bold">Order Confirmation</h1>
        </div>
    </div>

    <div class="container mx-auto p-6 max-w-4xl">
        
        <!-- Success Message -->
        <div class="bg-green-600 text-white p-6 rounded-lg mb-8 text-center">
            <div class="text-6xl mb-4">✅</div>
            <h1 class="text-3xl font-bold mb-2">Order Placed Successfully!</h1>
            <p class="text-lg">Thank you for your purchase. Your order has been received and is being processed.</p>
        </div>

        <!-- Order Details -->
        <div class="bg-gray-800 rounded-lg p-6 shadow-lg mb-6">
            <h2 class="text-2xl font-bold text-green-400 mb-6">Order Details</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-white font-semibold mb-2">Order Information</h3>
                    <p class="text-gray-300">Order Number: <span class="text-white font-bold">{{ $order->order_number }}</span></p>
                    <p class="text-gray-300">Date: <span class="text-white">{{ $order->created_at->format('M d, Y') }}</span></p>
                    <p class="text-gray-300">Status: <span class="text-yellow-400 font-bold capitalize">{{ $order->status }}</span></p>
                    <p class="text-gray-300">Payment: <span class="text-white capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</span></p>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-2">Shipping Address</h3>
                    <p class="text-gray-300">{{ $order->customer_name }}</p>
                    <p class="text-gray-300">{{ $order->customer_email }}</p>
                    <p class="text-gray-300">{{ $order->customer_phone }}</p>
                    <p class="text-gray-300">{{ $order->shipping_address }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <h3 class="text-white font-semibold mb-4">Items Ordered</h3>
            @foreach($order->orderItems as $item)
            <div class="flex items-center gap-4 bg-gray-700 rounded-lg p-4 mb-4">
                <div class="w-16 h-16 bg-gray-600 rounded flex items-center justify-center">
                    <span class="text-2xl">🏋️</span>
                </div>
                
                <div class="flex-1">
                    <h4 class="text-white font-semibold">{{ $item->product_name }}</h4>
                    <p class="text-gray-300">Quantity: {{ $item->quantity }}</p>
                    <p class="text-green-400">${{ number_format($item->price, 2) }} each</p>
                </div>
                
                <div class="text-right">
                    <p class="text-white font-bold">${{ number_format($item->subtotal, 2) }}</p>
                </div>
            </div>
            @endforeach

            <!-- Order Summary -->
            <div class="border-t border-gray-600 pt-4 max-w-sm ml-auto">
                <div class="flex justify-between text-gray-300 mb-2">
                    <span>Subtotal:</span>
                    <span>${{ number_format($order->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-300 mb-2">
                    <span>Shipping:</span>
                    <span>
                        @if($order->shipping == 0)
                            <span class="text-green-400">Free</span>
                        @else
                            ${{ number_format($order->shipping, 2) }}
                        @endif
                    </span>
                </div>
                <div class="flex justify-between text-gray-300 mb-2">
                    <span>Tax:</span>
                    <span>${{ number_format($order->tax, 2) }}</span>
                </div>
                <hr class="border-gray-600 my-2">
                <div class="flex justify-between text-white font-bold text-lg">
                    <span>Total:</span>
                    <span class="text-green-400">${{ number_format($order->total, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-gray-800 rounded-lg p-6 shadow-lg mb-6">
            <h3 class="text-xl font-bold text-green-400 mb-4">What's Next?</h3>
            <div class="space-y-3 text-gray-300">
                <p>• You will receive an email confirmation shortly at {{ $order->customer_email }}</p>
                <p>• We'll send you tracking information once your order ships</p>
                <p>• Estimated delivery: 3-5 business days</p>
                @if($order->payment_method === 'cash_on_delivery')
                <p class="text-yellow-400">• Please have exact cash ready for delivery</p>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('dumbells.index') }}" 
               class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-center">
                Continue Shopping
            </a>
            
            @auth
            <a href="{{ route('orders.history') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-center">
                View Order History
            </a>
            @endauth
            
            <button onclick="window.print()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Print Receipt
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-600 text-white p-4 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>