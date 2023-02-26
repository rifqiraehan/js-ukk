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
        $produkHabis = [];
        $produkKurang = [];

        foreach ($this->order->orderItems as $item) {
            $product = $item->product;
            if ($product->stok == 0){
                array_push($produkHabis, $product->name);
            } elseif ($item->quantity > $product->stok) {
                array_push($produkKurang, $product->name);
            }
        }

        if(count($produkHabis) > 0 || count($produkKurang) > 0) {
            $produkHabisStr = implode(", ", $produkHabis);
            $produkKurangStr = implode(", ", $produkKurang);
            $pesanError = "";
            if(count($produkHabis) > 0) {
                $pesanError = "Stok produk " . $produkHabisStr . " habis. ";
            }
            if(count($produkKurang) > 0) {
                $pesanError .= "Jumlah yang dipesan untuk produk " . $produkKurangStr . " melebihi stok yang tersedia.";
            }
            return redirect()->back()->with('error', $pesanError);
        } else {
            $this->order->order_status_id = 2;
            $this->order->save();
            $this->order->refresh();
        }
    }

    public function batalkanPesanan()
    {
        $this->order->order_status_id = 5;
        $this->order->save();
        $this->order->refresh();
    }

    public function pesananSiap()
    {
        $this->order->order_status_id = 3;
        $this->order->save();
        $this->order->refresh();
    }

    public function pesananSelesai()
    {
        $this->order->order_status_id = 4;
        $this->order->save();
        $this->order->refresh();

        foreach ($this->order->orderItems as $item) {
            $item->product->decrement('stok', $item->quantity);

        }
    }


    public function render()
    {
        return view('livewire.pesanan-detail');
    }
}
