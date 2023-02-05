<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('murid.cart');
    }
}
