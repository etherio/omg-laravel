<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('/products', ProductController::class)
    ->middleware(['auth']);
