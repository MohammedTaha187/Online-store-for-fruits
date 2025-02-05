<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\web\LangController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('about', [OwnerController::class, 'index'])->name('about');



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
