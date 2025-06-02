<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productGlove;

class productGloveController extends Controller
{
       public function show($id)
    {
        $glove = productGlove::findOrFail($id);
        return view('gloves.show', compact('glove'));
    }

     public function index()
    {
        $glove = productGlove::all();
        return response()->json($glove);
    }

    // API version - Show one dumbell by ID
    public function showApi($id)
    {
        $glove = productGlove::find($id);

        if (!$glove) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($glove);
    }
}
