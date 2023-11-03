<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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

Route::get('/product',[productController::class, 'SemuaProduct']);
Route::get('/product/Motorcycles',[productController::class, 'ProdukMotorcycles']);
Route::get('/product/ClassicCars',[productController::class, 'ProdukClassicCars']);
Route::get('/product/Planes',[productController::class, 'ProdukPlanes']);
Route::get('/product/Trains',[productController::class, 'ProdukTrains']);
Route::get('/product/Ships',[productController::class, 'ProdukShips']);
Route::get('/product/TrucksBuses',[productController::class, 'ProdukTrucksBuses']);
Route::get('/product/VintageCars',[productController::class, 'ProdukVintageCars']);
Route::get('/product/{productCode}',[productController::class, 'detaildata'])->name('readDetail');