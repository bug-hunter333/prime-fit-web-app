<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rack;

class RackController extends Controller
{
   public function index()
{
    $racks = Rack::all(); // lowercase
    return view('racks.index', compact('racks')); // lowercase
}

}
