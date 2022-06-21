<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StripeCheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('merci',function(){
    return view('merci.index');
});
Route::post('/save-order',OrderController::class)->name('order.save');
Route::get('/checkout',[StripeCheckoutController::class,'create'])->name('checkout');
Route::post('/paymentIntent',[StripeCheckoutController::class,'paymentIntent'])->name('checkout');

Route::get('shopping-cart', ShoppingCartController::class)->name('shopping-cart.index');

Route::get('products', [ProductController::class,'index'])->name('products.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
