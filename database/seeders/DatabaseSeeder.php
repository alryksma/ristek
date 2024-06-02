<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\barang;
use App\Models\transaksi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // barang::factory(20)->create();
        // transaksi::factory(10)->create();

        admin::create([
            'username' => 'alif arya',
            'password' => 'password',
        ]);
        User::create([
            'username' => 'apiw',
            'password' => 'password',
        ]);

        barang::create([
            'barang_id' => 1,
            'nama' => 'sepatu',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 2,
            'nama' => 'baju',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 3,
            'nama' => 'rokok',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 4,
            'nama' => 'keyboard',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 5,
            'nama' => 'mouse',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 6,
            'nama' => 'laptop',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 7,
            'nama' => 'gugugigui',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 8,
            'nama' => 'carjer',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 9,
            'nama' => 'bangke kucing',
            'jumlah_barang' => 15
        ]);
        barang::create([
            'barang_id' => 10,
            'nama' => 'pedang madara',
            'jumlah_barang' => 15
        ]);



        transaksi::create([
            'barang_id' => 1,
            'jenis_transaksi' => 'pinjam',
            'tanggal_pinjam' => '2022-01-09',
            'jumlah' => 2
        ]);
        transaksi::create([
            'barang_id' => 2,
            'jenis_transaksi' => 'pinjam',
            'tanggal_pinjam' => '2022-01-09',
            'jumlah' => 2
        ]);


    }
}
