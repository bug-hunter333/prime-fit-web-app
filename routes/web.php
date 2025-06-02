
<?php

use App\Http\Controllers\BarbellCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarbellsController;
use App\Http\Controllers\dumbellsController;
use App\Http\Controllers\GlovesController;
use App\Http\Controllers\productBarbellController;
use App\Http\Controllers\productdumbell;
use App\Http\Controllers\RackController;
use App\Http\Controllers\YogaController;
use App\Http\Controllers\ProductDumbellController;
use App\Http\Controllers\productGloveController;
use App\Http\Controllers\productRackController;
use App\Http\Controllers\productYogaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DumbellCartController;
use App\Http\Controllers\GloveCartController;
use App\Http\Controllers\GloveCheckoutController;
use App\Http\Controllers\YogaCartController;
use App\Http\Controllers\RackCartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/dumbells', [dumbellsController::class, 'index'])->name('dumbells.index');
Route::get('/barbells', [BarbellsController::class, 'index'])->name('barbells.index');
Route::get('/gloves', [GlovesController::class, 'index'])->name('gloves.index');
Route::get('/yoga', [YogaController::class, 'index'])->name('yoga.index');
Route::get('/racks', [RackController::class, 'index'])->name('racks.index');
Route::get('/barbells/{id}',[productBarbellController::class, 'show'])->name('barbells.show');
Route::get('/dumbells/{id}', [ProductDumbellController::class, 'show'])->name('dumbells.show');
Route::get('/gloves/{id}', [productGloveController::class, 'show'])->name('gloves.show');
Route::get('/yoga/{id}', [productYogaController::class, 'show'])->name('yoga.show');
Route::get('/racks/{id}', [productRackController::class, 'show'])->name('racks.show');


// cart display and add/remove items

Route::post('/cart/dumbell/add', [DumbellCartController::class, 'add'])->name('dumbells.add');
Route::get('/cart/dumbell', [DumbellCartController::class, 'display'])->name('dumbells.display');
Route::get('/cart/dumbell/{id}', [DumbellCartController::class, 'remove'])->name('dumbells.remove');
//checkout routes for dumbells
Route::get('/dumbell/checkout', [DumbellCartController::class, 'checkoutForm'])->name('dumbells.checkout');
Route::post('/dumbell/checkout', [DumbellCartController::class, 'processCheckout'])->name('dumbells.checkout.process');


Route::post('/cart/barbell/add', [BarbellCartController::class, 'add'])->name('barbells.add');
Route::get('/cart/barbell', [BarbellCartController::class, 'display'])->name('barbells.display');
Route::get('/cart/barbell/{id}', [BarbellCartController::class, 'remove'])->name('barbells.remove');
//checkout routes for barbells
Route::get('/barbell/checkout', [BarbellCartController::class, 'checkoutForm'])->name('barbells.checkout');
Route::post('/barbell/checkout', [BarbellCartController::class, 'processCheckout'])->name('barbells.checkout.process');


Route::post('/cart/gloves/add', [GloveCartController::class, 'add'])->name('gloves.add');
Route::get('/cart/gloves', [GloveCartController::class, 'display'])->name('gloves.display');
Route::get('/cart/gloves/{id}', [GloveCartController::class, 'remove'])->name('gloves.remove');

Route::get('/checkout/gloves', [GloveCartController::class, 'checkoutForm'])->name('gloves.checkout');
Route::post('/checkout/gloves', [GloveCartController::class, 'processCheckout'])->name('gloves.checkout.process');









Route::post('/cart/yoga/add', [YogaCartController::class, 'add'])->name('yoga.add');
Route::get('/cart/yoga/{id}', [YogaCartController::class, 'remove'])->name('yoga.remove');
Route::get('/cart/yoga', [YogaCartController::class, 'display'])->name('yoga.display');

Route::get('/checkout/yoga', [YogaCartController::class, 'checkoutForm'])->name('yoga.checkout');
Route::post('/checkout/yoga', [YogaCartController::class, 'processCheckout'])->name('yoga.checkout.process');



Route::post('/racks/cart/add', [RackCartController::class, 'add'])->name('racks.add');
Route::get('/racks/cart/remove/{id}', [RackCartController::class, 'remove'])->name('racks.remove');
Route::get('/cart/racks', [RackCartController::class, 'display'])->name('racks.display');
// Show checkout form
Route::get('/checkout', [RackCartController::class, 'checkoutForm'])->name('racks.checkout');
Route::post('/checkout', [RackCartController::class, 'processCheckout'])->name('racks.checkout.process');

// Home route
Route::get('/', function () {
    return view('home.index');
})->name('index');


Route::get('/cart', [CartController::class, 'display'])->name('cart.display');




// // Redirect root to first dumbbell's detail page for testing
// Route::get('/', function () {
//     return redirect()->route('dumbells.show', ['id' => 1]);
// })->name('home'); // Named 'home' for clarity

// // // List all dumbbells (index)
// // Route::get('/dumbells', [ProductDumbellController::class, 'index'])->name('dumbells.index');

// // Show single dumbbell details - **needs {id} parameter**
// Route::get('/dumbells/{id}', [ProductDumbellController::class, 'show'])->name('dumbells.show');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home.index');
    })->name('dashboard');
});
