<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view("home.supplier.index", compact("supplier"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.supplier.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);
        return redirect('/supplier');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = supplier::find($id);
        return view('home.supplier.edit', compact('supplier'));
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
        $supplier = supplier::find($id);
        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat'=> $request->alamat,
            'no_telp'=> $request->no_telp,
        ]);
        return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = supplier::find($id);
        $supplier->delete();
        return redirect('/supplier');
    }
}
