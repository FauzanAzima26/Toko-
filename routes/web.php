<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\logController;
use App\Http\Controllers\Backend\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/inventaris', [dashboardController::class, 'index'])->name('dashboard');

Route::get('/log', [logController::class, 'index'])->name('log');
