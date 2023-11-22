<?php

use App\Http\Controllers\BarangController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard', function () {
	return view('dashboard');
})->name('dashboard');

Route::controller(BarangController::class)->prefix('barang')->group(function () {
	Route::get('', 'index')->name('barang');
	Route::get('tambah', 'tambah')->name('barang.tambah');
	Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
	Route::get('edit/{kode_barang}', 'edit')->name('barang.edit');
	Route::post('edit/{kode_barang}', 'update')->name('barang.tambah.update');
	Route::get('hapus/{kode_barang}', 'hapus')->name('barang.hapus');
});
