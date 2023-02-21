<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Pesanan extends Component
{
    use WithPagination;

    protected $orders;
    public $search;
    public $statusFilter;

    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function mount()
    {
        $user = auth()->user();

        $this->orders = Order::whereHas('orderItems.product', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with('user')
            ->when($this->search, function ($query) {
                $query->where('status', 'like', '%' . $this->search . '%')
                      ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderByDesc('created_at')
            ->paginate(5);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pesanan', [
            'orders' => $this->orders
        ]);
    }
}

