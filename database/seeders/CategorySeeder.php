<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
            'name' => 'Minuman'
        ]);
        ProductCategory::create([
            'name' => 'Menu Sarapan'
        ]);
        ProductCategory::create([
            'name' => 'Manisan'
        ]);
        ProductCategory::create([
            'name' => 'Makanan Pedas'
        ]);
    }
}
