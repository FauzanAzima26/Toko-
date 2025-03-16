<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('inventaris', InventoryController::class)->names('admin.inventaris');

    Route::get('log', [logController::class, 'index'])->name('log');
});

Route::get('/home', [App\Http\Controllers\Frontend\homeController::class, 'index'])->name('home');