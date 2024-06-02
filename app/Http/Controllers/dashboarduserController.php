<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Http\Request;

class dashboarduserController
{
    public function pinjam(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,barang_id', // Sesuaikan dengan nama kolom di tabel 'barangs'
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        $barang = barang::findOrFail($validated['barang_id']);
        $jumlah_pinjam = $validated['jumlah'];

        // Pastikan jumlah barang yang dipinjam tidak melebihi jumlah yang tersedia
        if ($jumlah_pinjam > $barang->jumlah_barang) {
            return redirect('/dashboard-peminjam')->with('error', 'Jumlah barang yang ingin dipinjam melebihi stok yang tersedia');
        }

        // Kurangi jumlah barang yang tersedia dalam stok
        $barang->jumlah_barang -= $jumlah_pinjam;
        $barang->save();

        // Buat transaksi baru
        $transaksi = new transaksi();
        $transaksi->barang_id = $validated['barang_id'];
        $transaksi->jumlah = $jumlah_pinjam;
        $transaksi->user_id = auth()->user()->id; // Ambil ID user yang sedang login
        $transaksi->jenis_transaksi = 'pinjam'; // Set status transaksi menjadi 'Dipinjam'
        $transaksi->tanggal_pinjam = $validated['tanggal_pinjam']; // Set tanggal pinjam
        $transaksi->save();

        return redirect('/dashboard-peminjam')->with('success', 'Barang berhasil dipinjam');
    }

    public function kembai(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,barang_id', // Pastikan barang_id valid dan ada di tabel barangs
            'jumlah' => 'required|integer|min:1', // Pastikan jumlah adalah bilangan bulat positif
        ]);

        $barang = barang::findOrFail($validated['barang_id']);
        $jumlah_kembali = $validated['jumlah'];

        // Cari transaksi berdasarkan barang yang dipilih dan user yang sedang login
        $transaksi = transaksi::where('barang_id', $barang->barang_id)
            ->where('user_id', auth()->user()->id) // Filter by the logged-in user's ID
            ->where('jenis_transaksi', 'pinjam')
            ->orderBy('created_at', 'asc')
            ->first();

        // Jika tidak ada transaksi yang sesuai, kembalikan dengan pesan error
        if (!$transaksi) {
            return redirect('/kembalikanbarang')->with('error', 'Tidak ada transaksi untuk barang yang dipilih.');
        }

        // Validasi jumlah yang dikembalikan tidak melebihi jumlah yang dipinjam
        if ($jumlah_kembali > $transaksi->jumlah) {
            return redirect('/kembalikanbarang')->with('error', 'Jumlah yang dikembalikan melebihi jumlah yang dipinjam.');
        }

        // Update jumlah barang yang dikembalikan di transaksi
        $transaksi->jumlah -= $jumlah_kembali;
        $transaksi->save();

        // Perbarui jumlah barang yang tersedia di tabel barang
        $barang->jumlah_barang += $jumlah_kembali;
        $barang->save();

        // Jika jumlah barang yang dikembalikan sama dengan jumlah yang dipinjam, hapus transaksi
        if ($transaksi->jumlah === 0) {
            $transaksi->delete();
        }

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect('/kembalikanbarang')->with('success', 'Barang berhasil dikembalikan.');
    }
}
