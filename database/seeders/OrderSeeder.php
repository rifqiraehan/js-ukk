<?php

namespace Database\Seeders;

use App\Models\Cart;
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
        foreach (range(8, 15) as $i) {
            foreach (range(1, 3) as $j) {
                $carts = collect();

                foreach (range(1, 3) as $k) {
                    $product = Product::find(rand(1, 20));
                    $quantity = rand(1, 5);

                    $cart = Cart::create([
                        'user_id' => $i,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                    ]);

                    $carts->push($cart);
                }

                // Grouping carts by seller (user_id)
                $groupedCarts = $carts->groupBy('product.user_id');

                // Looping through grouped carts
                foreach ($groupedCarts as $groupedCart) {
                    // Creating order
                    $order = Order::create([
                        'user_id' => $i,
                        'total' => 0,
                        'order_status_id' => rand(1, 3),
                    ]);

                    // Creating order items
                    $total = 0;
                    foreach ($groupedCart as $cart) {
                        $order->orderItems()->create([
                            'order_id' => $order->id,
                            'product_id' => $cart->product_id,
                            'sub_total' => $cart->product->harga * $cart->quantity,
                            'quantity' => $cart->quantity,
                        ]);

                        $total += $cart->product->harga * $cart->quantity;
                    }

                    // Updating order total
                    $order->total = $total;
                    $order->save();
                }
            }
        }
    }
}
