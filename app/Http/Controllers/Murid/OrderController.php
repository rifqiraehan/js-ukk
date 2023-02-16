<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders->load('orderItems.product', 'orderStatus');

        $orderItems = $orders->first()->orderItems;

        return view('murid.order.index', compact('orders'));

    }

    public function show(Order $order)
    {
        $order->load('orderItems.product', 'orderStatus');

        return view('murid.order.show', compact('order'));
    }


}
