<?php

namespace App\Http\Controllers;

use App\Models\Transaksis;
use Illuminate\Http\Request;

class transaksicontroller extends Controller
{
    public function transaksi()
    {
        $transaksi= Transaksis::all();
        return view('transaksi',compact('transaksi'));
    }

    public function store(Request $request)
    {
        $transaksi = new Transaksis();
        $transaksi->id_transaksi= $request->id_transaksi;
        $transaksi->tanggal_transaksi= $request->tanggal_transaksi;
        $transaksi->jenis_transaksi = $request->jenis_transaksi;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->id_karyawan = $request->id_karyawan;
        
        $transaksi->save();
        session()->flash('success','Data berhasil di simpan');
        return redirect()->back();
    }

    public function hapus($id)
    {
        $transaksi = Transaksis::where('id', $id)
              ->delete();

        return redirect('/transaksi');

    }
}
