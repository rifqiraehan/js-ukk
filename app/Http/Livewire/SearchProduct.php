<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProduct extends Component
{
    use WithPagination;
    public $search;

    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function mount()
    {
        $this->productSearch();
    }

    public function productSearch()
    {
        $this->search = Product::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('detail', 'like', '%' . $this->search . '%')
                ->orWhere('harga', 'like', '%' . $this->search . '%')
                ->orWhere('stok', 'like', '%' . $this->search . '%');
        })->paginate(5);
    }

    // fix Laravel Livewire Searching Issue on Page >1
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->productSearch();
        return view('livewire.search-product');
    }
}
