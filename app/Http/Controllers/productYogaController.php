<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productYoga;

class productYogaController extends Controller
{
    public function show($id)
    {
        $yog = productYoga::findOrFail($id);
        return view('yoga.show', compact('yog'));
    }

     public function index()
    {
        $yog = productYoga::all();
        return response()->json($yog);
    }

    // API version - Show one dumbell by ID
    public function showApi($id)
    {
        $yog = productYoga::find($id);

        if (!$yog) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($yog);
    }
}
