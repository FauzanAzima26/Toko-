<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inventory>
 */
class inventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'nama_produk' => $this->faker->word,
            'spesifikasi' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'satuan' => $this->faker->randomElement(['pcs', 'kg', 'liter', 'meter']),
            'harga_jual' => $this->faker->numberBetween(1000, 1000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
