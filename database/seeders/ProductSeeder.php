<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Product::create([
        //     'name' => 'Ayam Rebus',
        //     'detail' => 'Dengan nasi dan telur',
        //     'harga' => '10000',
        //     'stok' => '10',
        //     'foto' => '',
        //     'user_id' => '7'
        // ]);

        Product::factory(20)->create();
    }
}
