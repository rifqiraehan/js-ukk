<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts->load('product');

        return view('murid.cart', [
            'carts' => $carts
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = \App\Models\Product::find($request->product_id);

        if ($product->stok < 1) {
            return redirect()->back()->with('error', 'Maaf! Stok telah habis.');
        }

        $cart = \App\Models\Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            return redirect()->back()->with('error', 'Produk sudah ada di dalam keranjang!');
        } else {
            $cart = \App\Models\Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    }

    function destroy($id)
    {
        $cart = \App\Models\Cart::find($id);

        if ($cart) {
            $cart->delete();
        }

        // return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
