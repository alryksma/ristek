<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('barang_id')->on('barangs');
            $table->enum('jenis_transaksi', ['pinjam', 'kembali']);
            $table->date('tanggal_pinjam');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah');
            // $table->enum('status', ['pinjam', 'kembali']); // Tambahkan kolom status
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
