<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbells;

class BarbellsController extends Controller
{
    public function index()
    {
        // Fetch all barbells from the database
        $barbells = Barbells::all();

        // Return a view with the barbells data
        return view('Barbells.index', compact('barbells'));
    }
}
