<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class Keranjang extends Component
{
    public $carts;
    public $quantity;
    public $isEmpty = false;

    public function mount()
    {
        $this->carts = auth()->user()->carts->load('product');

        if ($this->carts->isEmpty()) {
            $this->isEmpty = true;
        }
    }

    public function incrementQty($cartId)
    {
        $cart = Cart::find($cartId);
        $product = $cart->product;

        if ($cart->quantity < $product->stok) {
            $cart->quantity++;
            $cart->save();
        }
        $this->mount();
    }

    public function decrementQty($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart->quantity > 1) {
            $cart->quantity--;
            $cart->save();
            $this->mount();
        }
    }

    public function updateQty($cartId, $qty)
    {
        $cart = Cart::find($cartId);
        $cart->quantity = $qty;
        $cart->save();
        $this->mount();
    }

    public function updateTotal()
    {
        $this->carts = auth()->user()->carts->load('product');
    }

    public function deleteCart($cartId)
    {
        $cart = Cart::find($cartId);
        $cart->delete();
        $this->mount();
        // session()->flash('success', 'Cart berhasil dihapus!');
    }


    public function render()
    {
        return view('livewire.keranjang');
    }
}
