<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPriceController;
use Illuminate\Support\Facades\Route;


// Products API Routes

Route::apiResource('products', ProductController::class);

// Product Prices API Routes

Route::get('products/{product}/prices', [ProductPriceController::class, 'index'])->name('products.prices.index');
Route::post('products/{product}/prices', [ProductPriceController::class, 'store'])->name('products.prices.store');