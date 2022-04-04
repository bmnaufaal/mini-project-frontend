<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PelangganController::class, 'index']);
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/itempenjualan', [ItemPenjualanController::class, 'index']);
// Route::get('/saveID', [TableController::class, 'saveID']);
