<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'barang_id'); // Memastikan foreign key adalah 'barang_id'
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
