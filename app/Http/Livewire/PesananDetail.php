<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class PesananDetail extends Component
{
    public $orders;
    public $order;

    public function mount(Order $order)
    {
        $order->load('orderItems.product', 'orderStatus');
    }

    public function konfirmasiPesanan()
    {
        $this->order->order_status_id = 2;
        $this->order->save();
        $this->order->refresh();

        // $this->order->update([
        //     'order_status_id' => 2
        // ]);
    }

    public function batalkanPesanan()
    {
        $this->order->order_status_id = 5;
        $this->order->save();
        $this->order->refresh();

        // $this->order->update([
        //     'order_status_id' => 5
        // ]);
    }

    public function pesananSiap()
    {
        $this->order->order_status_id = 3;
        $this->order->save();
        $this->order->refresh();

        // $this->order->update([
        //     'order_status_id' => 3
        // ]);
    }

    public function pesananSelesai()
    {
        $this->order->order_status_id = 4;
        $this->order->save();
        $this->order->refresh();

        foreach ($this->order->orderItems as $item) {
            // $item->product->stok -= $item->quantity;
            // $item->product->save();
            $item->product->decrement('stok', $item->quantity);

        }

        // $this->order->update([
        //     'order_status_id' => 4
        // ]);
    }


    public function render()
    {
        return view('livewire.pesanan-detail');
    }
}
