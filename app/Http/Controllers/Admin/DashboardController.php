<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPenghasilan = null;
        $pesananBelumKonfirmasi = null;
        $waktuPesananBaru = null;
        $sellerCount = null;
        $waktuPenggunaBaru = null;
        $users = null;
        $totalProduct = null;
        $waktuProductBaru = null;

        if (auth()->user()->role_id == 1) {
            $users = User::all();
            $sellerCount = User::whereHas('role', function ($query) {
                $query->where('name', 'penjual');
            })->count();
            $waktuPenggunaBaru = User::orderBy('created_at', 'desc')->first()->created_at->diffForHumans();

            $totalProduct = Product::count();
            $waktuProductBaru = Product::orderBy('created_at', 'desc')->first()->created_at->diffForHumans();
        } elseif (auth()->user()->role_id == 2) {
            $totalPenghasilan = Order::whereHas('orderItems.product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->where('order_status_id', 4)->sum('total');

            $pesananBelumKonfirmasi = Order::whereHas('orderItems.product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->where('order_status_id', 1)->count();

            $waktuPesananBaru = Order::whereHas('orderItems.product', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->where('order_status_id', 1)->orderBy('created_at', 'desc')->first();

            if ($waktuPesananBaru) {
                $waktuPesananBaru = $waktuPesananBaru->created_at->diffForHumans();
            }
        }

        return view('dashboard', compact('users', 'sellerCount', 'totalPenghasilan', 'pesananBelumKonfirmasi', 'waktuPesananBaru', 'waktuPenggunaBaru', 'totalProduct', 'waktuProductBaru'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
