<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentDetail extends Component
{
    public $carts;
    public $shippingType = 'Ambil Sendiri';
    public $total;
    public $subTotal;
    public $shippingCost = 3000;

    public function mount()
    {
        $this->carts = auth()->user()->carts->load('product');
        $this->subTotal = $this->carts->sum(function ($cart) {return $cart->product->harga * $cart->quantity;});
        $this->total = $this->subTotal;
    }

    public function updateTotal()
    {
        if ($this->shippingType == 'Ambil Sendiri') {
           $this->total = $this->subTotal;
        } else {
            $this->total = $this->subTotal + $this->shippingCost;
        }
    }

    public function render()
    {
        return view('livewire.payment-detail');
    }
}
