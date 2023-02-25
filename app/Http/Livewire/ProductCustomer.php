<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCustomer extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::paginate(8);
    }

    public function render()
    {
        return view('livewire.product-customer');
    }
}
