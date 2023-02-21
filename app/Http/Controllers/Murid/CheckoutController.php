<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts->load('product');

        // Grouping carts by seller (user_id)
        $groupedCarts = $carts->groupBy('product.user_id');

        return view('murid.checkout', compact('carts', 'groupedCarts'));
    }

    public function store()
    {
        $carts = auth()->user()->carts->load('product');

        // Grouping carts by seller (user_id)
        $groupedCarts = $carts->groupBy('product.user_id');

        // Looping through grouped carts
        foreach ($groupedCarts as $groupedCart) {
            // Creating order
            $order = \App\Models\Order::create([
                'user_id' => auth()->user()->id,
                'total' => 0,
                'order_status_id' => 1,
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

            // Deleting carts
            Cart::where('user_id', auth()->user()->id)->delete();
        }

        return redirect()->route('murid.order.index')->with('success', 'Pesanan berhasil dibuat');
    }
}

