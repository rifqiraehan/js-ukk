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

        return view('murid.checkout', compact('carts'));
    }

    public function store()
    {

        $carts = auth()->user()->carts->load('product');

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->product->harga * $cart->quantity;
        }

        $order = \App\Models\Order::create([
            'user_id' => auth()->user()->id,
            'total' => $total,
            'order_status_id' => 1,
        ]);


        foreach ($carts as $cart) {
            $order->orderItems()->create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'sub_total' => $cart->product->harga * $cart->quantity,
                'quantity' => $cart->quantity,
            ]);
        }

        Cart::where('user_id', auth()->user()->id)->delete();

        return redirect()->route('murid.order.index')->with('success', 'Pesanan berhasil dibuat');
    }
}

