<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class karyawancontroller extends Controller
{
    public function karyawan()
    {
        $karyawan = Karyawan::all();
        return view('karyawan',compact('karyawan'));
    }

    public function store(Request $request)
    {
        $karyawan = new Karyawan();
        $karyawan->id_karyawan = $request->id_karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->jns_kelamin = $request->jns_kelamin;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;

        $karyawan->save();
        session()->flash('success','Data berhasil di simpan');
        return redirect()->back();
    }

    public function hapus($id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)
              ->delete();

        return redirect('/karyawan');
    }

    public function update($id_karyawan)
    {
        // mengambil data karyawan berdasarkan id yang dipilih
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->get();
        // passing data produk yang didapat ke view edit.blade.php
        
        return redirect('/karyawan');
        //return view('update', ['karyawan' => $karyawan]);
    }

    public function storeupdate(Request $request)
    {
        $barang = Karyawan::where('id_karyawan', $request->id_karyawan)->update([
            'nama' => $request->nama,
            'jns_kelamin' => $request->jns_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
               
        ]);
        
        // alihkan halaman ke halaman produk
        return redirect('/karyawan');
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $karyawan = Karyawan::where('nama','Like','%'.$request->cari.'%')
                    ->get();
        }
        else {
            $karyawan = Karyawan::all();
        }
        return view('/karyawan',['karyawan'=>$karyawan]);
        }
}
