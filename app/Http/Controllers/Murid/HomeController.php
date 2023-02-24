<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seller = $request->get('penjual');
        $users = User::all();
        if ($seller) {
            $products = Product::where('user_id', $seller)->paginate(8);
        } else {
            $products = Product::paginate(8);
        }

        $products = Product::where('name', '!=', null)
            ->when($request->term, function ($query, $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('name', 'LIKE', '%' . $term . '%')
                          ->orWhereHas('user', function ($q) use ($term) {
                              $q->where('name', 'LIKE', '%' . $term . '%');
                          });
                });
            })
            ->when($seller, function ($query, $seller) {
                $query->where('user_id', $seller);
            })
            ->paginate(8);

        return view('murid.product.index', compact('products', 'users'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $users = User::all();

        return view('murid.product.show', compact('product', 'users'));
    }
}
