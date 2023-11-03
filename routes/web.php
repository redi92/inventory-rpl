<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SasprasController;
use App\Http\Controllers\karyawancontroller;
use App\Http\Controllers\barangcontroller;
use App\Http\Controllers\homecontroller;
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

Route::get('/tampil', function () {
    return view('master_layout');
});
Route::get('/', [homecontroller::class, 'master']);
Route::get('/home', [homecontroller::class, 'master']);

Route::get('/karyawan', [karyawancontroller::class, 'karyawan']);
Route::get('/barang', [barangcontroller::class, 'barang']);
Route::get('/transaksi', [transaksicontroller::class, 'transaksi']);
Route::get('/statusbarang', [statusbarangcontroller::class, 'statusbarang']);
Route::post('/karyawan', [karyawancontroller::class, 'store']);
Route::post('/barang', [barangcontroller::class, 'store']);
Route::post('/transaksi', [transaksicontroller::class, 'store']);
Route::post('/statusbarang', [statusbarangcontroller::class, 'store']);


Route::get('/transaksi/update/{id_transaksi}', [transaksicontroller::class, 'update']);
Route::post('/transaksi/storeupdate', [transaksicontroller::class, 'storeupdate']);
Route::get('/transaksi/hapus/{id_transaksi}', [transaksicontroller::class, 'hapus']);
Route::get('/transaksi/cari', [transaksicontroller::class, 'cari']);

Route::get('/statusbarang/update/{id_status}', [statusbarangcontroller::class, 'update']);
Route::post('/statusbarang/storeupdate', [statusbarangcontroller::class, 'storeupdate']);
Route::get('/statusbarang/hapus/{id_status}', [statusbarangcontroller::class, 'hapus']);
Route::get('/statusbarang/cari', [statusbarangcontroller::class, 'cari']);


Route::get('/barang/update/{id_barang}', [barangcontroller::class, 'update']);
Route::post('/barang/storeupdate', [barangcontroller::class, 'storeupdate']);
Route::get('/barang/hapus/{id_barang}', [barangcontroller::class, 'hapus']);
Route::get('/barang/cari', [barangcontroller::class, 'cari']);

Route::get('/karyawan/{id_karyawan}/update', [karyawancontroller::class, 'update']);
Route::put('/karyawan/storeupdate', [karyawancontroller::class, 'storeupdate']);
Route::get('/karyawan/hapus/{id_karyawan}', [karyawancontroller::class, 'hapus']);
Route::get('/karyawan/cari', [karyawancontroller::class, 'cari']);

Route::get('/saspras', [SasprasController::class, 'index']);
