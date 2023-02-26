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
        $this->updatingOrders();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingOrders()
    {
        $user = auth()->user();

        $this->orders = Order::whereHas('orderItems.product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->with('user')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('user', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                        $query->orWhere('kelas', 'like', '%' . $this->search . '%');
                        $query->orWhere('jurusan', 'like', '%' . $this->search . '%');
                    })
                        ->orWhereHas('orderItems.product', function ($query) {
                            $query->where('name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('total', 'like', '%' . $this->search . '%')
                        ->orWhereHas('orderItems.product', function ($query) {
                            $query->whereHas('user', function ($query) {
                                $query->where('name', 'like', '%' . $this->search . '%');
                            });
                        });
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->whereHas('orderStatus', function ($query) {
                    $query->where('status', 'like', '%' . $this->statusFilter . '%');
                });
            })
            ->orderByDesc('created_at')
            ->paginate(5);
    }


    public function render()
    {
        $this->updatingOrders();

        // $user = auth()->user();
        // dd($user);

        return view('livewire.pesanan', [
            'orders' => $this->orders
        ]);
    }
}
