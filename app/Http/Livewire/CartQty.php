<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartQty extends Component
{
    public $cartId;
    public $quantity;
    public $cart;

    public function mount($cartId, $quantity)
    {
        $this->cartId = $cartId;
        $this->quantity = $quantity;
    }

    public function increment()
    {
        $this->quantity++;
        $this->updateQty();
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
        $this->updateQty();
    }

    public function updateQty()
    {
        Cart::find($this->cartId)
        ->update(['quantity' => $this->quantity]);
    }

    public function render()
    {
        return view('livewire.cart-qty');
    }
}
