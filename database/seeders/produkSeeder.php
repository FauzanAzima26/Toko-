<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Jasa__Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jasa__Produk::factory(10)->create();
    }
}
