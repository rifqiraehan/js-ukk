<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPenjual extends Controller
{
    public function index()
    {
        return view('penjual.laporan.index');
    }
}
