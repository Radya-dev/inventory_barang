<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalBarangMasuk = BarangMasuk::sum('jumlah');
        $totalBarangKeluar = BarangKeluar::sum('jumlah');
        $totalSupplier = Supplier::count('id');

        $barang_masuk = BarangMasuk::with('barang', 'supplier')
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        $barang_keluar = BarangKeluar::with('barang')
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        return view('home.dashboard', compact('totalBarang','totalBarangMasuk','totalBarangKeluar','totalSupplier','barang_masuk','barang_keluar'));
    }
}
