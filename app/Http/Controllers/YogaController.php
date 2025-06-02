<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glove;
use App\Models\Yoga;

class YogaController extends Controller
{
    public function index()
    {
        // Fetch all gloves from the database
        $yoga= Yoga::all();

        // Return a view with the yogas data
        return view('yoga.index', compact('yoga'));
    }
}
