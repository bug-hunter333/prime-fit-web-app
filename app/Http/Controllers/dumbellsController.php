<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dumbell; // Keep only one model import
use App\Models\dumbells;

class dumbellsController extends Controller
{
    public function index()
    {
        $dumbells = dumbells::all(); // Use the proper model name
        return view('dumbells.index', compact('dumbells'));
    }

    
}