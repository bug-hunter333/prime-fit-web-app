<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'message' => 'Welcome to your dashboard!',
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}
