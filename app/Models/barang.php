<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $guarded = ['barang_id'];
    protected $primaryKey = 'barang_id';
    public $incrementing = true; // Default true, memastikan primary key auto-increment
    protected $keyType = 'int'; // Default 'int', memastikan primary key bertipe integer

    public function getJumlahSisaAttribute()
    {
        $pinjam = $this->transaksis()->where('jenis_transaksi', 'pinjam')->sum('jumlah');
        $kembali = $this->transaksis()->where('jenis_transaksi', 'kembali')->sum('jumlah');
        return $this->jumlah_barang - $pinjam + $kembali;
    }

    public function scopeFilter($query)
    {
        if(request('search')){
            $query->where('nama', 'like', '%' . request('search') . '%');
        }

    }


    public function transaksis()
    {
        return $this->hasMany(transaksi::class, 'barang_id');
    }

}
