<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPriceController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Products API Routes

Route::apiResource('products', ProductController::class);