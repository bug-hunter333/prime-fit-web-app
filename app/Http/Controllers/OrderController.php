<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirmation($orderId)
    {
        $order = Order::with('orderItems')->findOrFail($orderId);
        
        if (Auth::check() && $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to order');
        }
        
        return view('order.confirmation', compact('order'));
    }
}

/* 
Create this view file: resources/views/order/confirmation.blade.php
*/