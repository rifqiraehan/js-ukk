<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
                Order::create([
                    'user_id' => $i,
                    'order_status_id' => rand(1, 4),
                    'total' => rand(5000, 30000),
                ]);
            }
        }
    }
}
