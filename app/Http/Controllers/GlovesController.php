<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gloves;

class GlovesController extends Controller
{
    public function index()
    {
        // Fetch all gloves from the database
        $gloves = Gloves::all();

        // Return a view with the gloves data
        return view('Gloves.index', compact('gloves'));
    }
}
