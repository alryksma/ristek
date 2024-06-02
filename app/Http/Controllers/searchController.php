<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class searchController
{
    public function index(Request $request)
    {
        $searchResults = barang::filter()->get();
        return view('caribarang', [
            'title' => 'pencaharian',
            'active' => 'search',
            // 'barang' => barang::all(),
            'barang' => $searchResults


        ]);
    }
}
