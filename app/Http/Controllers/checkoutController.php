<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productdumbell;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    /**
     * Handle Buy Now - store item in session and redirect to checkout
     */
    public function buyNow(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:productdumbells,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Productdumbell::findOrFail($request->product_id);
        
        // Check stock availability
        if ($product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Insufficient stock available.');
        }

        // Store checkout item in session
        session()->put('checkout_item', [
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'image_url' => $product->image_url,
            'weight' => $product->weight,
            'subtotal' => $product->price * $request->quantity
        ]);

        return redirect()->route('checkout.show');
    }

    /**
     * Display checkout page
     */
    public function show()
    {
        $checkoutItem = session('checkout_item');
        
        if (!$checkoutItem) {
            return redirect()->route('dumbells.index')->with('error', 'No items to checkout.');
        }

        // Calculate totals
        $subtotal = $checkoutItem['subtotal'];
        $shipping = $subtotal > 100 ? 0 : 15; // Free shipping over $100
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $shipping + $tax;

        return view('checkout.show', compact('checkoutItem', 'subtotal', 'shipping', 'tax', 'total'));
    }

    /**
     * Process the order
     */
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'payment_method' => 'required|in:credit_card,paypal,cash_on_delivery'
        ]);

        $checkoutItem = session('checkout_item');
        
        if (!$checkoutItem) {
            return redirect()->route('dumbells.index')->with('error', 'Session expired. Please try again.');
        }

        // Calculate totals
        $subtotal = $checkoutItem['subtotal'];
        $shipping = $subtotal > 100 ? 0 : 15;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        // Create order
        $order = Order::create([
            // 'user_id' => auth()->id(), // null if guest
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'shipping_address' => $request->address . ', ' . $request->city . ' ' . $request->zip_code,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        // Create order item
        OrderItem::create([
            'order_id' => $order->id,
            'product_type' => 'dumbell',
            'product_id' => $checkoutItem['product_id'],
            'product_name' => $checkoutItem['name'],
            'price' => $checkoutItem['price'],
            'quantity' => $checkoutItem['quantity'],
            'subtotal' => $checkoutItem['subtotal']
        ]);

        // Update product quantity
        $product = Productdumbell::find($checkoutItem['product_id']);
        $product->decrement('quantity', $checkoutItem['quantity']);

        // Clear checkout session
        session()->forget('checkout_item');

        return redirect()->route('order.confirmation', $order->id)
                        ->with('success', 'Order placed successfully!');
    }
}