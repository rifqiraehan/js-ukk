<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts;

        return view('murid.cart', [
            'carts' => $carts
        ]);
    }
}
