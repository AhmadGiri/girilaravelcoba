<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaProduk = \App\Models\Produk::all();
        return view('produk.index', compact('semuaProduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            return view('produk.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                'nama_barang'=>'required',
                'harga'=> 'required|numeric',
                'stok'=> 'required|numeric'
            ]);

            \App\Models\Produk::create([
                'nama_barang'=>$request->nama_barang,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
            ]);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
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
        $produk =\App\Models\Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk =\App\Models\Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk =\App\Models\Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
    }
}
