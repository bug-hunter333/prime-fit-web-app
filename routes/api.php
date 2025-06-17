<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDumbellController;
use App\Http\Controllers\BarbellsController;
use App\Http\Controllers\GlovesController;
use App\Http\Controllers\ProductBarbellController;
use App\Http\Controllers\productGloveController;
use App\Http\Controllers\productRackController;
use App\Http\Controllers\productYogaController;
use App\Http\Controllers\YogaController;
use App\Http\Controllers\RackController;


use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/dumbells', [ProductdumbellController::class, 'index'])->name('dumbells.index');
Route::get('/barbells', [ProductbarbellController::class, 'index'])->name('barbells.index');
Route::get('/gloves', [productGloveController::class, 'index'])->name('gloves.index');
Route::get('/yoga', [productYogaController::class, 'index'])->name('yoga.index');
Route::get('/racks', [productRackController::class, 'index'])->name('racks.index');



Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');