<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SasprasController;
use App\Http\Controllers\karyawancontroller;
use App\Http\Controllers\barangcontroller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\statusbarangcontroller;
use App\Http\Controllers\transaksicontroller;

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

// Route::get('/home', function () {
//     return view('home', [homeController::class, 'data']);
// });

Route::get('/',[homeController::class,'data']);
Route::get('/home',[homeController::class,'data']);

Route::get('/karyawan', [karyawancontroller::class,'karyawan'])->name('karyawan');
Route::get('/data_karyawan', [karyawancontroller::class,'data_karyawans']);
Route::get('/barang', [barangcontroller::class,'barang'])->name('barang');
Route::get('/transaksi', [transaksicontroller::class,'transaksi']);
Route::get('/statusbarang', [statusbarangcontroller::class,'statusbarang']);
Route::post('/karyawan', [karyawancontroller::class,'store']);
Route::post('/barang', [barangcontroller::class,'store']);
Route::post('/transaksi', [transaksicontroller::class,'store']);
Route::post('/statusbarang', [statusbarangcontroller::class,'store']);


Route::get('/transaksi/hapus/{id}',[transaksicontroller::class,'hapus']);


Route::get('/statusbarang/update/{id_status}', [statusbarangcontroller::class, 'update']);
Route::post('/statusbarang/storeupdate', [statusbarangcontroller::class, 'storeupdate']);
Route::get('/statusbarang/hapus/{id_status}',[statusbarangcontroller::class,'hapus']);


Route::get('/barang/update/{id_barang}', [barangcontroller::class, 'update']);
Route::post('/barang/storeupdate', [barangcontroller::class, 'storeupdate']);
Route::get('/barang/hapus/{id_barang}',[barangcontroller::class,'hapus']);

Route::get('/karyawan/{id_karyawan}/update', [karyawancontroller::class, 'update']);
Route::put('/karyawan/storeupdate', [karyawancontroller::class, 'storeupdate']);
Route::get('/karyawan/hapus/{id_karyawan}',[karyawancontroller::class,'hapus']);


Route::get('/saspras', [SasprasController::class,'index']);
Route::get('/karyawan/data', [karyawancontroller::class,'data']);
