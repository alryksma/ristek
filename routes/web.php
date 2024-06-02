<?php

use App\Models\barang;
use App\Models\transaksi;
use App\Http\Middleware\IsAdmin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\dashboarduserController;

Route::get('/', [homeController::class, 'index']);

Route::get('/cari-barang', [searchController::class, 'index']);




// admin
Route::get('/login-admin',[loginController::class, 'indexAdmin'])->name('login')->middleware('guest');
Route::post('/login-admin',[loginController::class, 'authenticate2']);
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::resource('/dashboard', adminController::class)->middleware('auth');

    Route::get('/tambahbarang', function () {
        return view('dashboard.admin.tambahbarang', [
            'title' => 'beranda',
            'active' => 'dashboard',
            'barang' => barang::with('transaksis')->get(),
            'transaksi' => transaksi::with('barang')->get()
        ]);
    });

    Route::get('/hapusbarang', function () {
        return view('dashboard.admin.hapusbarang', [
            'title' => 'beranda',
            'active' => 'dashboard',
            'barang' => barang::with('transaksis')->get(),
            'transaksi' => transaksi::with('barang')->get()
        ]);
    });

    Route::delete('/dashboard', [AdminController::class, 'destroy']);

    Route::get('/editbarang', function () {
        return view('dashboard.admin.editbarang', [
            'title' => 'beranda',
            'active' => 'dashboard',
            'barang' => barang::with('transaksis')->get(),
        ]);
    });
    Route::put('/editbarang',[adminController::class, 'update']);
});






// user
Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register',[registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);



Route::get('/dashboard-peminjam', function () {
    return view('dashboard.peminjam.dashboardpeminjam',  [
        'title' => 'beranda',
        'active' => 'dashboard',
        'barang' => barang::with('transaksis')->get(),
        'transaksi' => transaksi::with('barang')->get()
    ]);
})->middleware('auth');


Route::get('/pinjambarang', function () {
    return view('dashboard.peminjam.pinjambarang',  [
        'title' => 'beranda',
        'active' => 'dashboard',
        'barang' => App\Models\barang::with('transaksis')->get(),
        'transaksi' => App\Models\transaksi::with(['barang', 'user'])->get() // Menggunakan relasi tunggal
    ]);
})->middleware('auth');
Route::post('/pinjambarang', [dashboarduserController::class, 'pinjam'])->middleware('auth');


Route::get('/kembalikanbarang', function () {
    return view('dashboard.peminjam.kembalibarang',  [
        'title' => 'beranda',
        'active' => 'dashboard',
        'barang' => App\Models\barang::with('transaksis')->get(),
        'transaksi' => App\Models\transaksi::with(['barang', 'user'])->get() // Menggunakan relasi tunggal
    ]);
})->middleware('auth');
Route::post('/kembalikanbarang', [dashboarduserController::class, 'kembai'])->middleware('auth');






