<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
    $products = Product::all();

    return view('home', compact('products'));
})->name('home');

Route::resource('products', 'ProductController');
Route::resource('cart', 'CartController');

Route::post('checkout', 'CheckoutController@checkout')->name('checkout');
Route::get('payment-success', 'CheckoutController@paymentSuccess')->name('payment-success');

Route::get('search', 'SearchController@search');
