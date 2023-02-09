<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts;

        return view('murid.cart', [
            'carts' => $carts
        ]);
    }

    function store(Request $request)
    {
        return redirect()->back()->with('error', 'Stock tidak mencukupi');
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = \App\Models\Product::find($request->product_id);

        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Stock tidak mencukupi');
        }

        $cart = \App\Models\Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->qty += 1;
            $cart->save();
        } else {
            $cart = \App\Models\Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'qty' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }
}
