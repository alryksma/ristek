<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class homeController
{
    public function index()
    {
        return view('home', [
            'title' => 'beranda',
            'active' => 'home',
            'barang' => barang::with('transaksis')->get(),

        ]);
        return view('barang.index', compact('barang'));
    }
}
