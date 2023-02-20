<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Pesanan extends Component
{
    protected $orders;
    public $status;

    public function mount()
    {
        $user = auth()->user();

        $this->orders = Order::whereHas('orderItems.product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with('user')
        ->orderByDesc('created_at')
        ->paginate(3);
    }

    // public function updateStatus($orderId, $status)
    // {
    //     // wire:model="status" wire:change="updateStatus({{ $order->id }}, $event.target.value)"

    //     $order = Order::find($orderId);
    //     $order->OrderStatus()->update(['status' => $status]);

    //     $this->mount();
    // }

    public function render()
    {
        return view('livewire.pesanan', [
            'orders' => $this->orders
        ]);
    }
}
