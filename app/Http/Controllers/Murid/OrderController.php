<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('murid.order.index');
    }

    public function show()
    {
        return view('murid.order.show');
    }
}
