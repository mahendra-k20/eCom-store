<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('dashboard', [HomeController::class, 'login_user'])->name('login_user')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::get('admin/category', [AdminController::class, 'category'])->name('admin.category')->middleware(['auth', 'admin']);

Route::post('admin/add_category', [AdminController::class, 'add_categroy'])->name('admin.add_category')->middleware(['auth', 'admin']);

Route::get('admin/delete_category/{id}', [AdminController::class, 'delete_category'])->name('admin.delete_category')->middleware(['auth', 'admin']);

Route::get('admin/edit_category/{id}', [AdminController::class, 'edit_category'])->name('admin.edit_category')->middleware(['auth', 'admin']);

Route::post('admin/update_category/{id}', [AdminController::class, 'update_category'])->name('admin.update_category')->middleware(['auth', 'admin']);

Route::get('admin/add_product', [AdminController::class, 'add_product'])->name('admin.add_product')->middleware(['auth', 'admin']);

Route::post('admin/upload_product', [AdminController::class, 'upload_product'])->name('admin.upload_product')->middleware(['auth', 'admin']);

Route::get('admin/view_product', [AdminController::class, 'view_product'])->name('admin.view_product')->middleware(['auth', 'admin']);

Route::get('admin/delete_product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete_product')->middleware(['auth', 'admin']);

Route::get('admin/edit_product/{id}', [AdminController::class, 'edit_product'])->name('admin.edit_product')->middleware(['auth', 'admin']);

Route::post('admin/update_product/{id}', [AdminController::class, 'update_product'])->name('admin.update_product')->middleware(['auth', 'admin']);

Route::get('admin/search_product', [AdminController::class, 'search_product'])->name('admin.search_product')->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart')->middleware(['auth', 'verified']);

Route::get('cart', [HomeController::class, 'cart'])->name('cart')->middleware(['auth', 'verified']);

Route::get('remove_product/{id}', [HomeController::class, 'remove_product'])->name('remove_product')->middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->name('confirm_order')->middleware(['auth', 'verified']);

Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout')->middleware(['auth', 'verified']);
