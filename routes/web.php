<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\web\LangController;


//home
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');


//about
Route::get('about', [OwnerController::class, 'index'])->name('about');




//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

//contact
Route::get('/contact' , [MessageController::class, 'index'])->name('contact.index');
Route::post('/contact', [MessageController::class, 'store'])->name('message.store');

//cats
Route::get('/shop' , [CategoryController::class, 'index'])->name('shop.index');
Route::get('/shop/{category}', [CategoryController::class, 'show'])->name('categories.show');

//orders
Route::get('/checkout' , [OrderController::class , 'index'])->name('order.index');
Route::post('/checkout' , [OrderController::class , 'store'])->name('order.store');





Route::get('/change-language/{lang}', [LangController::class, 'setLang'])->name('changeLanguage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
