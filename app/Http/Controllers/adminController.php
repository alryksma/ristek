<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Http\Request;

class adminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.dashboard', [
            'title' => 'beranda',
            'active' => 'dashboard',
            'barang' => barang::with('transaksis')->get(),
            'transaksi' => transaksi::with('barang')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|unique:barangs|max:255|min:1|integer',
            'nama' => 'required|min:1|max:255',
            'jumlah_barang' => 'nullable',
        ]);

        $validated[] =

            barang::create($validated);

        return redirect('/tambahbarang')->with('succes', 'barang ditamahkan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $barang = Barang::all();
        return view('dashboard.admin.editbarang', compact('barangs'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|integer|exists:barangs,barang_id',
            'nama' => 'required|min:1|max:255',
            'jumlah_barang' => 'nullable|integer|min:0',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);
        $barang->nama = $validated['nama'];
        $barang->jumlah_barang = $validated['jumlah_barang'];
        $barang->save();

        return redirect('/dashboard')->with('success', 'Barang berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,barang_id|integer|max:255|min:1',
        ]);

        // Retrieve the barang instance
        $barang = barang::findOrFail($validated['barang_id']);

        // Manually delete related records
        // Example: If related_table has a foreign key referencing barang_id
        transaksi::where('barang_id', $barang->barang_id)->delete();

        // Delete the barang instance
        $barang->delete();

        return redirect('/hapusbarang')->with('success', 'Barang berhasil dihapus');
    }
}
