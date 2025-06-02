<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productGlove; // Ensure this model exists and is properly named

class GloveCartController extends Controller
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

        $product = productGlove::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Glove product not found.');
        }

        $cart = session()->get('glove_cart', []);

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

        session()->put('glove_cart', $cart);

        return redirect()->route('gloves.display')->with('success', 'Glove added to cart!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cart = session()->get('glove_cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('glove_cart', $cart);
            return redirect()->route('gloves.display')->with('success', 'Item removed from cart.');
        }

        return redirect()->route('gloves.display')->with('error', 'Item not found in cart.');
    }

    // Display cart
    public function display()
    {
        $cart = session()->get('glove_cart', []);
        return view('gloves.display', compact('cart'));
    }


        // Show the checkout page
public function checkoutForm()
{
    $cart = session()->get('glove_cart', []);
    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    if (empty($cart)) {
        return redirect()->route('gloves.display')->with('error', 'Your cart is empty.');
    }

    return view('gloves.checkout', compact('cart', 'total'));
}

public function processCheckout(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string|max:500',
    ]);

    // Store order logic here if needed

    session()->forget('glove_cart');

    return redirect()->route('gloves.display')->with('success', 'Order placed successfully!');
}
 
}
