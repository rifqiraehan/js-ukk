<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanAdmin extends Component
{
    use WithPagination;

    protected $orders;
    protected $selectedDateRange = null;
    public $totalRevenue = 0;
    public $clickedUser;

    public function mount($clickedUser)
    {
        $this->fetchOrders($clickedUser);
        $this->clickedUser = $clickedUser;
    }

    public function fetchOrders($clickedUser)
    {
        $query = Order::whereHas('orderItems.product', function ($query) use ($clickedUser) {
            $query->where('user_id', $clickedUser->id)
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
        $this->fetchOrders($this->clickedUser);
    }

    public function render()
    {
        return view('livewire.laporan-admin', [
            'orders' => $this->orders,
            'totalRevenue' => $this->totalRevenue,
            'selectedDateRange' => $this->selectedDateRange,
        ]);
    }
}
