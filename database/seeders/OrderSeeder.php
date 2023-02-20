<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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
                $order = Order::create([
                    'user_id' => $i,
                    'total' => rand(5000, 30000),
                ]);

                $total = 0;

                foreach(range(1, 3) as $k) {
                    $product = Product::find(rand(1, 20));
                    $quantity = rand(1, 5);

                    $sub_total = $product->harga * $quantity;
                    $total += $sub_total;

                    $order->orderItems()->create([
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'sub_total' => $sub_total,
                        'order_status_id' => rand(1, 5),
                    ]);
                }

                $order->update([
                    'total' => $total,
                ]);

            }
        }
    }
}
