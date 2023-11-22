<?php

use App\Models\products;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home');
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{productLine}', [ProductController::class, 'showByProductLine']);
Route::get('/product/{productLine}/{id}', [ProductController::class, 'showProductDetail']);
Route::get('/produk/{id}', [ProductController::class, 'showProductDetail']);
