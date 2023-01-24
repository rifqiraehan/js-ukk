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
        Product::create([
            'name' => 'Nasi Kuning',
            'detail' => 'Dengan telur dan ayam',
            'harga' => '6000',
            'stok' => '4',
            'foto' => '',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Mie Instan',
            'detail' => 'Dengan lombok dan telur',
            'harga' => '5000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Mie Ayam',
            'detail' => 'Dengan mie dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Sosis Bakar',
            'detail' => 'Dengan lapisan saos',
            'harga' => '3000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Donat',
            'detail' => 'Dengan lubang di tengah',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Soto Ayam',
            'detail' => 'Dengan ayam dan bumbu',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Cilok',
            'detail' => 'Dengan saus kacang',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Pecel Lontong',
            'detail' => 'Dengan lontong dan bumbu',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Nasi Goreng',
            'detail' => 'Dengan telur dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Ayam Goreng',
            'detail' => 'Dengan nasi dan telur',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Telur Goreng',
            'detail' => 'Dengan nasi dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Nasi Bakar',
            'detail' => 'Dengan telur dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Ayam Bakar',
            'detail' => 'Dengan nasi dan telur',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Telur Bakar',
            'detail' => 'Dengan nasi dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Nasi Rebus',
            'detail' => 'Dengan telur dan ayam',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Ayam Rebus',
            'detail' => 'Dengan nasi dan telur',
            'harga' => '10000',
            'stok' => '10',
            'foto' => '',
            'user_id' => '7'
        ]);

        // Product::factory(5)->create();
    }
}
