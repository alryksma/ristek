<?php

namespace Database\Factories;

use App\Models\barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => barang::factory(), // Menggunakan factory untuk membuat barang baru
            'jenis_transaksi' => $this->faker->randomElement(['pinjam', 'kembali']),
            'jumlah' => $this->faker->numberBetween(1, 10),
            'tanggal_pinjam' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
