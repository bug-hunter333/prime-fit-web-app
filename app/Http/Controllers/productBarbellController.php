<?php

namespace App\Http\Controllers;

use App\Models\productbarbell;
use Illuminate\Http\Request;

class ProductBarbellController extends Controller
{
     public function show($id)
    {
        $barbell = productbarbell::findOrFail($id);
        return view('barbells.show', compact('barbell'));
    }

     // API version - Show all dumbells
    public function index()
    {
        $barbells = productbarbell::all();
        return response()->json($barbells);
    }

    // API version - Show one dumbell by ID
    public function showApi($id)
    {
        $barbells = productbarbell::find($id);

        if (!$barbells) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($barbells);
    }
}
