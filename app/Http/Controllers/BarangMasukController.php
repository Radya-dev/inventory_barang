<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = $barang_masuk = BarangMasuk::all();
        return view('home.barang_masuk.index', compact('barang_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('home.barang_masuk.tambah', compact('barang','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_supplier'=> 'required',
            'jumlah'=> 'required|numeric',
        ]);

        $id = $request->id_barang;
        $barang = Barang::find($id);
        $barang->increment('stok', $request->jumlah);

        BarangMasuk::create([
            'id_barang'=> $request->id_barang,
            'id_supplier'=> $request->id_supplier,
            'jumlah'=> $request->jumlah,
        ]);

        return redirect('/barang_masuk')->with('success','Barang Masuk Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangMasuk = BarangMasuk::find($id);
        return view('home.barang_masuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function laporan()
    {
        $barang_masuk = BarangMasuk::all();

        return view("home.barang_masuk.laporan", compact("barang_masuk"));
    }

    public function struk(string $id)
    {
        $barang_masuk = BarangMasuk::find($id);
        return view('home.barang_masuk.struk', [
            'barang_masuk' => $barang_masuk,
            'jumlah_bayar' => $barang_masuk->jumlah * $barang_masuk->barang->harga,
            'tgl_pembayaran' => $barang_masuk->created_at->format('d-m-Y'),
        ]);
    }
}
