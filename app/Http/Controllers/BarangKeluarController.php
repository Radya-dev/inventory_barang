<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = $barang_keluar = BarangKeluar::all();
        return view('home.barang_keluar.index', compact('barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view('home.barang_keluar.tambah', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_customer'=> 'required',
            'jumlah'=> 'required|numeric',
        ]);

        $id = $request->id_barang;
        $barang = Barang::find($id);

        if ($barang->stok < $request->jumlah) {
            return redirect('/barang_keluar')->with('error','Stok Barang Tidak Mencukupi');
        }

        $barang->decrement('stok', $request->jumlah);
        BarangKeluar::create([
            'id_barang'=> $request->id_barang,
            'nama_customer'=> $request->nama_customer,
            'jumlah'=> $request->jumlah,
        ]);

        return redirect('/barang_keluar')->with('success','Barang Masuk Keluar Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $barang_keluar = BarangKeluar::all();

        return view("home.barang_keluar.laporan", compact("barang_keluar"));
    }

    public function struk(string $id)
    {
        $barang_keluar = BarangKeluar::find($id);
        return view('home.barang_keluar.struk', [
            'barang_keluar' => $barang_keluar,
            'jumlah_bayar' => $barang_keluar->jumlah * $barang_keluar->barang->harga,
            'tgl_pembayaran' => $barang_keluar->created_at->format('d-m-Y'),
        ]);
    }
}
