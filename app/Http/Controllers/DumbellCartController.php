<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productdumbell; // Replace with Product, Rack, etc. if needed

class DumbellCartController extends Controller
{
    public function add(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default to 1 if not provided

        // Find product
        $product = Productdumbell::find($productId); // Use your appropriate model
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Get or initialize the cart
        $cart = session()->get('dumbell_cart', []);

        // If already in cart, update quantity
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

        // Save back to session
        session()->put('dumbell_cart', $cart);

        return redirect()->route('dumbells.display')->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('dumbell_cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('dumbell_cart', $cart);
            return redirect()->route('dumbells.display')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('dumbells.display')->with('error', 'Item not found in cart.');
    }

    public function display()
    {
        $cart = session()->get('dumbell_cart', []);
        return view('dumbells.display', compact('cart'));
    }


        
    // Show the checkout page
public function checkoutForm()
{
    $cart = session()->get('dumbell_cart', []);
    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    if (empty($cart)) {
        return redirect()->route('dumbells.display')->with('error', 'Your cart is empty.');
    }

    return view('dumbells.checkout', compact('cart', 'total'));
}

public function processCheckout(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string|max:500',
    ]);

    // Store order logic here if needed

    session()->forget('dumbell_cart');

    return redirect()->route('dumbells.display')->with('success', 'Order placed successfully!');
}

}