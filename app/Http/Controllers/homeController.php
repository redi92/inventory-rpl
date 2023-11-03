<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Barang;
use App\Models\Transaksis;
use App\Models\Statusbarang;

class homecontroller extends Controller
{
    
    public function index()
    {
    $jumlah_karyawan =karyawan::all()->count();
    $jumlah_barang = Barang::all()->count();
    $jumlah_statusbarang = Statusbarang::all()->count();
    $jumlah_transaksi = Transaksis::all()->count();
    //return view('/home')->with('jumlah_karyawan',$jumlah_karyawan);
    return view('index',compact('jumlah_karyawan','jumlah_barang','jumlah_statusbarang',
                'jumlah_transaksi'));
    }

    public function master()
    {
    $jumlah_karyawan =karyawan::all()->count();
    $jumlah_barang = Barang::all()->count();
    $jumlah_statusbarang = Statusbarang::all()->count();
    $jumlah_transaksi = Transaksis::all()->count();
    //return view('/home')->with('jumlah_karyawan',$jumlah_karyawan);
    return view('home',compact('jumlah_karyawan','jumlah_barang','jumlah_statusbarang',
                'jumlah_transaksi'));
    }
}
