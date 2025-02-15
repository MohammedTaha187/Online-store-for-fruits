<?php

use Livewire\Livewire;
use App\Http\Livewire\SearchBar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\web\LangController;

// ✅ المسارات العامة (لا تحتاج إلى تسجيل دخول)
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('about', [OwnerController::class, 'index'])->name('about');
Route::get('/contact', [MessageController::class, 'index'])->name('contact.index');
Route::get('/shop', [CategoryController::class, 'index'])->name('shop.index');
Route::get('/shop/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/singlenews', [NewsController::class, 'single'])->name('singlenews.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('lang/{locale}', [LangController::class, 'switchLocale'])->name('lang.switch');

Route::get('/search', function () {
    return view('search-page'); // قم بإنشاء هذا الملف في resources/views
});

Route::middleware(['auth'])->group(function () {
    // 🛒 إدارة السلة
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // 📩 إرسال الرسائل
    Route::post('/messages', [MessageController::class, 'store'])->name('message.store');

    // 🛍️ الطلبات
    Route::get('/checkout', [OrderController::class, 'index'])->name('order.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');

    // 🛠️ إدارة الحساب الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ✅ المسارات المحمية بـ Jetstream + تأكيد البريد الإلكتروني
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
