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
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->id_karyawan = $request->id_karyawan;
        
        $transaksi->save();
        session()->flash('success','Data berhasil di simpan');
        return redirect()->back();
    }

    public function hapus($id_transaksi)
    {
        $transaksi = Transaksis::where('id_transaksi', $id_transaksi)
              ->delete();

        return redirect('/transaksi');

    }

    public function update($id_transaksi)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $transaksi =Transaksis::where('id_transaksi', $id_transaksi)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/transaksi');
    }

    public function storeupdate(Request $request){
        $transaksi = Transaksis::where('id_transaksi', $request->id_transaksi)->update([
          
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jenis_transaksi' => $request->jenis_transaksi,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'id_karyawan' => $request->id_karyawan,
            
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/transaksi');
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $transaksi = Transaksis::where('id_transaksi','like','%'.$request->cari.'%')
                    ->get();
        }
        else {
            $transaksi = Transaksis::all();
        }
        return view('/transaksi',['transaksi'=>$transaksi]);
        }
}
