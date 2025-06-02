<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prime Fit Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-900 min-h-screen">
    
<section class="max-w-4xl mx-auto bg-gray-800 border border-gray-700 rounded-xl shadow-xl mt-10 p-8 text-white">
    <h2 class="text-3xl font-bold mb-10 text-green-400 text-center flex items-center justify-center gap-2">
        <i class="fas fa-file-invoice-dollar"></i> PRIME FIT Checkout
    </h2>

    <form id="checkoutForm" class="space-y-10">
        <!-- Billing Info -->
        <div>
            <h3 class="text-xl font-semibold mb-4 text-green-300 flex items-center gap-2">
                <i class="fas fa-user"></i> Billing Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    placeholder="Full Name" 
                    required 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    placeholder="Email Address" 
                    required 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="phone" 
                    name="phone" 
                    type="tel" 
                    placeholder="Phone Number" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="company" 
                    name="company" 
                    type="text" 
                    placeholder="Company (optional)" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
            </div>
        </div>

        <!-- Shipping Address -->
        <div>
            <h3 class="text-xl font-semibold mb-4 text-green-300 flex items-center gap-2">
                <i class="fas fa-truck"></i> Shipping Address
            </h3>
            <div class="flex items-center mb-4">
                <input 
                    type="checkbox" 
                    id="sameAsBilling" 
                    class="mr-2 h-4 w-4 text-green-500 bg-gray-900 border-gray-600 rounded focus:ring-green-500"
                >
                <label for="sameAsBilling" class="text-sm text-gray-300">Same as billing address</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input 
                    id="address" 
                    name="address" 
                    type="text" 
                    placeholder="Street Address" 
                    required 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="city" 
                    name="city" 
                    type="text" 
                    placeholder="City" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="state" 
                    name="state" 
                    type="text" 
                    placeholder="State/Province" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="postal_code" 
                    name="postal_code" 
                    type="text" 
                    placeholder="Postal Code" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <select 
                    id="country" 
                    name="country" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors md:col-span-2"
                >
                    <option value="">Select Country</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="UK">United Kingdom</option>
                    <option value="AU">Australia</option>
                    <option value="DE">Germany</option>
                    <option value="FR">France</option>
                    <option value="IN">India</option>
                    <option value="JP">Japan</option>
                </select>
            </div>
        </div>

        <!-- Payment Info -->
        <div>
            <h3 class="text-xl font-semibold mb-4 text-green-300 flex items-center gap-2">
                <i class="fas fa-credit-card"></i> Payment Method
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input 
                    id="card_number" 
                    name="card_number" 
                    type="text" 
                    placeholder="Card Number" 
                    maxlength="19"
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="cardholder_name" 
                    name="cardholder_name" 
                    type="text" 
                    placeholder="Cardholder Name" 
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="expiry" 
                    name="expiry" 
                    type="text" 
                    placeholder="Expiry (MM/YY)" 
                    maxlength="5"
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <input 
                    id="cvv" 
                    name="cvv" 
                    type="text" 
                    placeholder="CVV" 
                    maxlength="4"
                    class="bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
            </div>
            <div id="cardValidation" class="mt-2 text-sm hidden">
                <span id="cardType" class="text-green-400"></span>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="border-t border-gray-700 pt-6">
            <h3 class="text-xl font-semibold mb-4 text-green-300 flex items-center gap-2">
                <i class="fas fa-receipt"></i> Order Summary
            </h3>
            <div class="space-y-2 text-sm">
                @foreach ($cart as $item)
                    <div class="flex justify-between items-center">
                        <span>{{ $item['name'] }} <span class="text-gray-400">(x{{ $item['quantity'] }})</span></span>
                        <span class="text-green-400">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                @endforeach

                <hr class="my-3 border-gray-700">

                <div class="flex justify-between mt-2">
                    <span class="font-semibold text-white">Subtotal</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>

                @php $shipping = 10.00; @endphp
                <div class="flex justify-between">
                    <span class="font-semibold text-white">Shipping</span>
                    <span>${{ number_format($shipping, 2) }}</span>
                </div>

                <div class="flex justify-between font-bold text-lg text-green-400 border-t border-gray-700 pt-2">
                    <span>Total</span>
                    <span>${{ number_format($total + $shipping, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Promo Code -->
        <div class="border-t border-gray-700 pt-6">
            <h3 class="text-lg font-semibold mb-4 text-green-300 flex items-center gap-2">
                <i class="fas fa-tag"></i> Promo Code
            </h3>
            <div class="flex gap-2">
                <input 
                    id="promoCode" 
                    type="text" 
                    placeholder="Enter promo code" 
                    class="flex-1 bg-gray-900 border border-gray-600 rounded px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none transition-colors"
                >
                <button 
                    type="button" 
                    id="applyPromo" 
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition-colors"
                >
                    Apply
                </button>
            </div>
            <div id="promoMessage" class="mt-2 text-sm hidden"></div>
        </div>

        <!-- Submit Button -->
        <div class="text-center pt-6">
            <button 
                type="submit" 
                id="submitBtn"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <i class="fas fa-check-circle mr-2"></i> 
                <span id="submitText">Place Order</span>
            </button>
        </div>
    </form>
</section>

<script>
// User data from Laravel
const userData = {
    name: '{{ auth()->user()->name ?? "" }}',
    email: '{{ auth()->user()->email ?? "" }}',
    phone: '{{ old("phone") ?? "" }}'
};

// // Promo codes
// const promoCodes = {
//     "YOGA20": { discount: 0.20, message: "20% discount applied!" },
//     "SAVE10": { discount: 0.10, message: "10% discount applied!" },
//     "WELLNESS": { discount: 0.15, message: "15% wellness discount applied!" }
// };

let currentDiscount = 0;

// Initialize the form
document.addEventListener('DOMContentLoaded', function() {
    populateUserData();
    setupEventListeners();
});

function populateUserData() {
    if (userData.name) document.getElementById('name').value = userData.name;
    if (userData.email) document.getElementById('email').value = userData.email;
    if (userData.phone) document.getElementById('phone').value = userData.phone;
}



function setupEventListeners() {
    // Same as billing checkbox
    document.getElementById('sameAsBilling').addEventListener('change', function() {
        const shippingFields = ['address', 'city', 'state', 'postal_code'];
        if (this.checked) {
            shippingFields.forEach(field => {
                const shippingField = document.getElementById(field);
                shippingField.value = userData.name.split(' ')[0] + " Address Data"; // Mock address
                shippingField.disabled = true;
                shippingField.classList.add('opacity-50');
            });
            document.getElementById('country').value = 'US';
            document.getElementById('country').disabled = true;
        } else {
            shippingFields.forEach(field => {
                const shippingField = document.getElementById(field);
                shippingField.value = '';
                shippingField.disabled = false;
                shippingField.classList.remove('opacity-50');
            });
            document.getElementById('country').disabled = false;
        }
    });

    // Card number formatting
    document.getElementById('card_number').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        if (formattedValue !== e.target.value) {
            e.target.value = formattedValue;
        }
        
        // Detect card type
        detectCardType(value);
    });

    // Expiry date formatting
    document.getElementById('expiry').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        e.target.value = value;
    });

    // CVV numeric only
    document.getElementById('cvv').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/\D/g, '');
    });

    // Promo code
    document.getElementById('applyPromo').addEventListener('click', applyPromoCode);
    
    document.getElementById('promoCode').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            applyPromoCode();
        }
    });

    // Form submission
    document.getElementById('checkoutForm').addEventListener('submit', handleSubmit);
}

function detectCardType(number) {
    const cardValidation = document.getElementById('cardValidation');
    const cardType = document.getElementById('cardType');
    
    if (number.length < 4) {
        cardValidation.classList.add('hidden');
        return;
    }
    
    let type = '';
    if (number.startsWith('4')) {
        type = '💳 Visa';
    } else if (number.startsWith('5') || number.startsWith('2')) {
        type = '💳 Mastercard';
    } else if (number.startsWith('3')) {
        type = '💳 American Express';
    } else {
        type = '💳 Unknown Card';
    }
    
    cardType.textContent = type;
    cardValidation.classList.remove('hidden');
}

function applyPromoCode() {
    const promoInput = document.getElementById('promoCode');
    const promoMessage = document.getElementById('promoMessage');
    const code = promoInput.value.trim().toUpperCase();
    
    if (promoCodes[code]) {
        currentDiscount = promoCodes[code].discount;
        promoMessage.textContent = promoCodes[code].message;
        promoMessage.className = 'mt-2 text-sm text-green-400';
        promoMessage.classList.remove('hidden');
        promoInput.disabled = true;
        document.getElementById('applyPromo').disabled = true;
        document.getElementById('applyPromo').textContent = 'Applied';
        
        // If you need to update totals dynamically, you can add that logic here
        // For now, the Laravel backend will handle the actual calculations
    } else {
        promoMessage.textContent = 'Invalid promo code';
        promoMessage.className = 'mt-2 text-sm text-red-400';
        promoMessage.classList.remove('hidden');
    }
}

function handleSubmit(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    
    // Disable button and show loading
    submitBtn.disabled = true;
    submitText.textContent = 'Processing...';
    
    // Simulate processing
    setTimeout(() => {
        submitText.textContent = 'Order Placed!';
        submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
        submitBtn.classList.add('bg-green-600');
        
        // Show success message
        alert('Order placed successfully! You will receive a confirmation email shortly.');
        
        // Reset after 3 seconds
        setTimeout(() => {
            submitBtn.disabled = false;
            submitText.textContent = 'Place Order';
            submitBtn.classList.remove('bg-green-600');
            submitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
        }, 3000);
    }, 2000);
}
</script>

</body>
</html>