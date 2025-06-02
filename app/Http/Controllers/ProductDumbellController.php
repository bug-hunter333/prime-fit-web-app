<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productdumbell;

class ProductDumbellController extends Controller
{
    // Web version (HTML view)
    public function show($id)
    {
        $dumbell = Productdumbell::findOrFail($id);
        return view('dumbells.show', compact('dumbell'));
    }

    // API version - Show all dumbells
    public function index()
    {
        $dumbells = Productdumbell::all();
        return response()->json($dumbells);
    }

    // API version - Show one dumbell by ID
    public function showApi($id)
    {
        $dumbell = Productdumbell::find($id);

        if (!$dumbell) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($dumbell);
    }
}
