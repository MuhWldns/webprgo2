<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route utama aplikasi toko baju online
|
*/

// 🏠 Halaman utama (daftar produk + kategori)
Route::get('/', [UserController::class, 'index'])->name('home');

// 🛍️ Detail produk
Route::get('/product/{id}', [UserController::class, 'show'])->name('product.detail');

// 🛒 Fitur keranjang
Route::get('/cart', [UserController::class, 'cart'])->name('cart.view');
Route::get('/add-to-cart/{id}', [UserController::class, 'addToCart'])->name('cart.add');
Route::get('/remove-from-cart/{id}', [UserController::class, 'removeFromCart'])->name('cart.remove');

// 📋 Dashboard (hanya untuk admin login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Route profile bawaan auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// End of file