<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\web\LangController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');


//about
Route::get('about', [OwnerController::class, 'index'])->name('about');




//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

//cats
Route::get('/shop' , [CategoryController::class, 'index'])->name('shop.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('categories.show');





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
