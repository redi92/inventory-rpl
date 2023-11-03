<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class barangcontroller extends Controller
{
    public function barang()
    {
        $barang = Barang::all();
        return view('barang',compact('barang'));
    }

    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->status_barang = $request->status_barang;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->tanggal_beli = $request->tanggal_beli;

        $barang->save();
        session()->flash('success','Data berhasil di simpan');
        return redirect()->back();
    }

    public function hapus($id_barang)
    {
        $barang = Barang::where('id_barang', $id_barang)
              ->delete();

        return redirect('/barang');

    }


    public function update($id_barang)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $barang =Barang::where('id_barang', $id_barang)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/barang');
    }

    public function storeupdate(Request $request){
        $barang = Barang::where('id_barang', $request->id_barang)->update([
          
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'status_barang' => $request->status_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_beli' => $request->harga_beli,
            'tanggal_beli' => $request->tanggal_beli
            
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/barang');
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $barang = Barang::where('nama_barang','like','%'.$request->cari.'%')
                    ->get();
        }
        else {
            $barang = Barang::all();
        }
        return view('/barang',['barang'=>$barang]);
    }

    }
