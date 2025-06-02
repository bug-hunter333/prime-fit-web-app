<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductYoga; // Ensure this model exists
use Illuminate\Support\Facades\Mail;
use App\Mail\YogaOrderConfirmation;
use Illuminate\Support\Facades\Log;

class YogaCartController extends Controller
{
    // Add item to cart
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = ProductYoga::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Yoga product not found.');
        }

        $cart = session()->get('yoga_cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image_url' => $product->image_url ?? null,
                'quantity' => $quantity,
            ];
        }

        session()->put('yoga_cart', $cart);

        return redirect()->route('yoga.display')->with('success', 'Yoga product added to cart!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = session()->get('yoga_cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('yoga_cart', $cart);
            return redirect()->route('yoga.display')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('yoga.display')->with('error', 'Item not found in cart.');
    }

    // Display cart
    public function display()
    {
        $cart = session()->get('yoga_cart', []);
        return view('yoga.display', compact('cart'));
    }


     // Show the checkout page
public function checkoutForm()
{
    $cart = session()->get('yoga_cart', []);
    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    if (empty($cart)) {
        return redirect()->route('yoga.display')->with('error', 'Your cart is empty.');
    }

    return view('yoga.checkout', compact('cart', 'total'));
}

 public function processCheckout(Request $request)
    {
        // Enhanced validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'card_number' => 'required|string',
            'cardholder_name' => 'required|string|max:255',
            'expiry' => 'required|string',
            'cvv' => 'required|string|min:3|max:4',
        ]);

        // Get cart and calculate total
        $cart = session()->get('yoga_cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.'
            ], 400);
        }

        try {
            // Here you would typically:
            // 1. Process payment with your payment gateway (Stripe, PayPal, etc.)
            // 2. Save order to database
            // 3. Update inventory

            // For now, we'll simulate successful payment processing
            // In production, add your payment processing logic here

            // Send confirmation email
            Mail::to($validated['email'])->send(new YogaOrderConfirmation($validated, $cart, $total));

            // Clear the cart after successful order
            session()->forget('yoga_cart');

            // Return JSON response for AJAX requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Order placed successfully! Confirmation email sent to ' . $validated['email']
                ]);
            }

            // Redirect for regular form submissions
            return redirect()->route('yoga.display')->with('success', 'Order placed successfully! Check your email for confirmation.');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Order processing failed: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'There was an error processing your order. Please try again.'
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'There was an error processing your order. Please try again.');
        }
    }
}
