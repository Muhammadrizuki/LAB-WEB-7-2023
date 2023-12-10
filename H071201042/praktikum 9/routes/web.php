<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('beranda');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'data'])->name('data');

Route::post('/home/input',[App\Http\Controllers\HomeController::class, 'inputData'])->name('inputData');
Route::post('/home/{id}',[App\Http\Controllers\HomeController::class, 'editData'])->name('editData');

Route::resource('/posts', \App\Http\Controllers\HomeController::class);
