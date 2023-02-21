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

        $this->status = 'all';

        $this->orders = Order::whereHas('orderItems.product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with('user')
        ->orderByDesc('created_at')
        ->paginate(5);
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        $order->orderStatus->status = $status;
        $order->orderStatus->save();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.pesanan', [
            'orders' => $this->orders
        ]);
    }
}
