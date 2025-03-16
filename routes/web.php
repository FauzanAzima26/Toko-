<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\Frontend\homeController;
use App\Http\Controllers\Backend\InventoryController;

Route::get('/', [homeController::class, 'index'])->name('frontend.home');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('inventaris', InventoryController::class)->names('admin.inventaris');

    Route::get('log', [logController::class, 'index'])->name('log');
});