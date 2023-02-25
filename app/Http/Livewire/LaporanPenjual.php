<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Carbon\Carbon;

class LaporanPenjual extends Component
{
    use WithPagination;

    protected $orders;
    protected $selectedDateRange = null;
    public $totalRevenue = 0;

    public function mount()
    {
        $this->fetchOrders();
    }

    public function fetchOrders()
    {
        $user = auth()->user();

        $query = Order::whereHas('orderItems.product', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('order_status_id', 4);
        });

        if ($this->selectedDateRange === 'hari-ini') {
            $query->whereDate('created_at', today());
        } elseif ($this->selectedDateRange === 'minggu-ini') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($this->selectedDateRange === 'bulan-ini') {
            $query->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month);
        }

        $this->orders = $query->get();
        $this->totalRevenue = $this->orders->sum('total');
    }

    public function selectDateRange($range)
    {
        $this->selectedDateRange = $range;
        $this->fetchOrders();
    }

    public function render()
    {
        return view('livewire.laporan-penjual', [
            'orders' => $this->orders,
            'totalRevenue' => $this->totalRevenue,
            'selectedDateRange' => $this->selectedDateRange,
        ]);
    }
}
