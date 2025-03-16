<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\Frontend\homeController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\frontend\cartController;

Route::get('/', [homeController::class, 'index'])->name('frontend.home');

Route::get('/cart', [cartController::class, 'index'])->name('frontend.cart');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('inventaris', InventoryController::class)->names('admin.inventaris');

    Route::get('log', [logController::class, 'index'])->name('log');
});