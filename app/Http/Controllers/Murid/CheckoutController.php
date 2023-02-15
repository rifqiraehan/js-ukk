<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts->load('product');

        return view('murid.checkout', compact('carts'));
    }
}

