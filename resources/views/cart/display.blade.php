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
        <a href="{{ route('index') }}">
            <b class="font-righteous text-4xl md:text-5xl font-extrabold text-green-500 hover:text-green-400 transition duration-300 transform hover:scale-105">
                PrimeFit
            </b>
        </a>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-10">

    <!-- Flash Messages -->
    <div id="successMessage" class="mb-6 max-w-3xl mx-auto bg-green-900 border border-green-600 text-green-400 px-4 py-3 rounded-md font-medium hidden">
        Item removed from cart successfully!
    </div>
    <div id="errorMessage" class="mb-6 max-w-3xl mx-auto bg-red-900 border border-red-600 text-red-400 px-4 py-3 rounded-md font-medium hidden">
        An error occurred. Please try again.
    </div>

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
            <tbody id="cartTableBody" class="divide-y divide-gray-700">
                <!-- Cart items will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Cart Total -->
    <div class="max-w-6xl mx-auto mt-6 bg-gray-800 border border-gray-700 rounded-xl p-6">
        <div class="flex justify-between items-center text-xl font-bold">
            <span>Total:</span>
            <span id="cartTotal" class="text-green-400">$0.00</span>
        </div>
        <div class="mt-4 flex justify-end">
            <button onclick="checkout()" class="bg-green-600 hover:bg-green-700 px-8 py-3 rounded-md shadow transition text-white font-medium">
                <i class="fas fa-credit-card mr-2"></i> Proceed to Checkout
            </button>
        </div>
    </div>
</main>

<script>
// Cart data
let cart = {
    1: {
        id: 1,
        name: "Hex Dumbbell 10kg",
        price: 45.99,
        quantity: 1,
        image_url: null
    },
    2: {
        id: 2,
        name: "Barbells with 2 Weight Plates",
        price: 129.99,
        quantity: 1,
        image_url: null
    },
    3: {
        id: 3,
        name: "Weightlifting Gloves",
        price: 24.99,
        quantity: 1,
        image_url: null
    },
    4: {
        id: 4,
        name: "Yoga Mats",
        price: 19.99,
        quantity: 2,
        image_url: null
    }
};

// Function to render cart items
function renderCart() {
    const cartTableBody = document.getElementById('cartTableBody');
    const cartTotal = document.getElementById('cartTotal');
    
    // Clear existing content
    cartTableBody.innerHTML = '';
    
    // Check if cart is empty
    if (Object.keys(cart).length === 0) {
        cartTableBody.innerHTML = `
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-400 italic">
                    🛍️ Your cart is empty. Start shopping now!
                </td>
            </tr>
        `;
        cartTotal.textContent = '$0.00';
        return;
    }
    
    let total = 0;
    
    // Render each cart item
    Object.values(cart).forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-700 transition duration-200';
        row.innerHTML = `
            <td class="p-4">
                <div class="w-16 h-16 bg-gray-600 rounded-md shadow-md flex items-center justify-center">
                    <i class="fas fa-dumbbell text-gray-400 text-2xl"></i>
                </div>
            </td>
            <td class="p-4 font-semibold">${item.name}</td>
            <td class="p-4 text-green-400 font-medium">$${item.price.toFixed(2)}</td>
            <td class="p-4">${item.quantity}</td>
            <td class="p-4 text-center">
                <button onclick="removeItem(${item.id})" class="inline-flex items-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md shadow transition text-white text-sm font-medium">
                    <i class="fas fa-trash mr-2"></i> Remove
                </button>
            </td>
        `;
        cartTableBody.appendChild(row);
    });
    
    // Update total
    cartTotal.textContent = `$${total.toFixed(2)}`;
}

// Function to remove item from cart
function removeItem(itemId) {
    if (cart[itemId]) {
        delete cart[itemId];
        renderCart();
        showMessage('successMessage', 'Item removed from cart successfully!');
    } else {
        showMessage('errorMessage', 'Item not found in cart.');
    }
}

// Function to show messages
function showMessage(elementId, message) {
    const messageElement = document.getElementById(elementId);
    messageElement.textContent = message;
    messageElement.classList.remove('hidden');
    
    // Hide message after 3 seconds
    setTimeout(() => {
        messageElement.classList.add('hidden');
    }, 3000);
}

// Function to handle checkout
function checkout() {
    if (Object.keys(cart).length === 0) {
        showMessage('errorMessage', 'Your cart is empty!');
        return;
    }
    
    // Simulate checkout process
    showMessage('successMessage', 'Redirecting to checkout...');
    setTimeout(() => {
        alert('Checkout functionality would be implemented here!');
    }, 1000);
}

// Function to handle logout
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        alert('Logout functionality would be implemented here!');
    }
}

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', function() {
    renderCart();
});
</script>

</body>
</html>