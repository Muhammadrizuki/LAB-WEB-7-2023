<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductsController::class, 'showProducts']);
Route::get('/product/details/{productCode}', [ProductsController::class, 'showProductByProductCode']);
Route::get('/product/{productLine}', [ProductsController::class, 'showProductByProductLine']);


