<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RidersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RidersController::class, 'index']);
Route::get('/edit', [RidersController::class, 'edit']);
// Route::get('/edit/update/{number}', [RidersController::class, 'edit']);
// Route::get('/edit/update/{number}', [RidersController::class, 'update']);
// Route::post('/edit/{number}', [RidersController::class, 'update']);
Route::get('/edit/update/{number}', [RidersController::class,'update']);
Route::put('/edit/update/{number}', [RidersController::class, 'save'])->name('riders.update');

Route::get('/edit/update/{number}/save', [RidersController::class,'save'])->name('saveRider');

// Route::get('/riders/create', [RidersController::class, 'create'])->name('riders.create');
// Route::post('/riders', [RidersController::class, 'store'])->name('riders.store');

Route::get('/create', [RidersController::class, 'create']);
Route::post('/create', [RidersController::class, 'store']);

Route::get('/edit/delete/{id}', [RidersController::class,'delete']);

// Rute Menampilkan Data Pembalab 
Route::get('/rider/{number}', [RidersController::class, 'showRider']);