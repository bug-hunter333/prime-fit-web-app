<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productRack;

class productRackController extends Controller
{
    public function show($id)
    {
        $rack = productRack::findOrFail($id);
        return view('racks.show', compact('rack'));
    }

     public function index()
    {
        $Rack = productRack::all();
        return response()->json($Rack);
    }

    // API version - Show one dumbell by ID
    public function showApi($id)
    {
        $Rack = productRack::find($id);

        if (!$Rack) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($Rack);
    }
}
