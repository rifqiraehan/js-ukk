<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(14, 20) as $i) {
            foreach(range(1, 3) as $j) {
                \App\Models\Cart::create([
                    'user_id' => $i,
                    'product_id' => rand(1, 20),
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}
