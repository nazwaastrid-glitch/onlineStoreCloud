<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

// 1. RUTE PUBLIK (Dapat diakses oleh siapa saja, jangan dibungkus middleware admin)
Route::get('/', [HomeController::class, 'index'])->name("home.index");
Route::get('/about', [HomeController::class, 'about'])->name("home.about");
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
Route::get('/cart/delete', [CartController::class, 'delete'])->name("cart.delete");
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name("cart.add");

Route::middleware('auth')->group(function () {
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

// 2. RUTE ADMIN (Hanya dapat diakses oleh user dengan role 'admin')
Route::middleware(['web', 'admin'])->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])->name("admin.product.update");
});

Auth::routes();