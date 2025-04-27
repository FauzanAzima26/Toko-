<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\Frontend\homeController;
use App\Http\Controllers\Frontend\shopController;
use App\Http\Controllers\Frontend\aboutController;
use App\Http\Controllers\Frontend\contactController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\Frontend\KeranjangController;
use App\Http\Controllers\Backend\jasa_produkController;

Route::get('/', [homeController::class, 'index'])->name('frontend.home');
Route::resource('shop', shopController::class)->names('frontend.shop');
Route::resource('cart', cartController::class)->names('frontend.cart');
Route::get('/about', [aboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [contactController::class, 'index'])->name('frontend.contact');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('inventaris', InventoryController::class)->names('admin.inventaris');
    Route::resource('jasa_produk', jasa_produkController::class)->names('admin.jasa_produk');

    Route::get('log', [logController::class, 'index'])->name('log');
});