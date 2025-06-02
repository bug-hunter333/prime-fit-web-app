<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
       public function display()
    {
        $cart = session()->get('cart', []);
        return view('cart.display', compact('cart'));
    }
}
