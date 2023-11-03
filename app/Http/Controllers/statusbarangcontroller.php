<?php

namespace App\Http\Controllers;

use App\Models\Statusbarang;
use Illuminate\Http\Request;

class statusbarangcontroller extends Controller
{
    public function statusbarang()
    {
        $statusbarang = Statusbarang::all();
        return view('statusbarang',compact('statusbarang'));
    }

    public function store(Request $request)
    {
        $statusbarang = new Statusbarang();
        $statusbarang->id_status = $request->id_status;
        $statusbarang->id_barang = $request->id_barang;
        $statusbarang->jml_bagus = $request->jml_bagus;
        $statusbarang->jml_rusak_ringan = $request->jml_rusak_ringan;
        $statusbarang->jml_rusak_berat = $request->jml_rusak_berat;
        
        $statusbarang->save();
        session()->flash('success','Data berhasil di simpan');
        return redirect()->back();
    }

    public function hapus($id_status)
    {
        $statusbarang = Statusbarang::where('id_status', $id_status)
              ->delete();

        return redirect('/statusbarang');

    }

    public function update($id_status)
    {
        // mengambil data status berdasarkan id yang dipilih
        $status = Karyawan::where('id_status', $id_status)->get();
        // passing data produk yang didapat ke view edit.blade.php
        
        return redirect('/statusbarang');
        //return view('update', ['status' => $status]);
    }

    public function storeupdate(Request $request)
    {
        $barang = Statusbarang::where('id_status', $request->id_status)->update([
            'id_barang' => $request->id_barang,
            'jml_bagus' => $request->jml_bagus,
            'jml_rusak_ringan' => $request->jml_rusak_ringan,
            'jml_rusak_berat' => $request->jml_rusak_berat
               
        ]);
        
        // alihkan halaman ke halaman produk
        return redirect('/statusbarang');
    }
}
