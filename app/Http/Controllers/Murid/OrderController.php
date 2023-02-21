<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('orderItems.product', 'orderStatus')
            ->orderByDesc('created_at')
            ->paginate(3);

        $orderItems = $orders->first()->orderItems;

        return view('murid.order.index', compact('orders'));

    }

    public function show(Order $order)
    {
        $order->load('orderItems.product', 'orderStatus');

        return view('murid.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('murid.order.index')->with('success', 'Pesanan berhasil dibatalkan');
    }

}
