<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'barang_id' => $this->faker->numberBetween(1, 100), // Ganti fake() menjadi $this->faker
            'nama' => fake()->word(),
            'jumlah_barang' => fake()->numberBetween(1, 20),

        ];
    }
}
