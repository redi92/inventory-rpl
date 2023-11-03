<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\status_barang;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function data()
    {
        $totalBarang = Home::sum('jumlah');
        $barangBaik = Home::Where('id_status', '=', 'St001')->VALUE('jumlah');
        $dataSemuaBarang = Home::select('barang.nama_barang', 'stat_barang.nama_status', 'data_barang.jumlah')
            ->join('barang', 'data_barang.id_barang', '=', 'barang.id_barang')
            ->join('stat_barang', 'data_barang.id_status', '=', 'stat_barang.id_status')
            ->get();

        // dd($totalBarang);
        // dd($barangBaik);
        // dd($dataSemuaBarang);
        return view('home', [
            'totalBarang' => $totalBarang,
            'barangBaik' => $barangBaik,
            'dataSemuaBarang' => $dataSemuaBarang

        ]);
    }
}
