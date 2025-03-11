<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\Backend\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::resource('inventaris', InventoryController::class)->names('admin.inventaris');

    Route::get('log', [logController::class, 'index'])->name('log');
});
