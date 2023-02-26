<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
            ->where('user_id', auth()->user()->id)
            ->when(request()->term, function ($query, $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('name', 'LIKE', '%' . $term . '%')
                        ->orWhere('detail', 'LIKE', '%' . $term . '%')
                        ->orWhere('harga', 'LIKE', '%' . $term . '%')
                        ->orWhere('stok', 'LIKE', '%' . $term . '%');
                });
                if ($term === 'kosong') {
                    $query->orWhere('stok', 0);
                }
            })
            ->orderByRaw('stok ASC')
            ->paginate(8);

        return view('penjual.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjual.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        // handle the uploaded image
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/product'), $fileName);
            $validated['foto'] = 'images/product/' . $fileName;
        }

        // Add the user_id to the request data
        $validated['user_id'] = Auth::id();

        $product = Product::create($validated);

        return redirect()->route('penjual.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('penjual.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd(public_path() .'/' .$product->foto);
        return view('penjual.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            if ($product->foto != null) {
                if ($product->foto != 'default/product.jpeg') {
                    File::delete(public_path() . '/' . $product->foto);
                }
            }

            $file = $request->file('foto');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/product'), $fileName);
            $validated['foto'] = 'images/product/' . $fileName;
        }

        $validated['user_id'] = Auth::id();
        $product->touch();

        $product->update($validated);
        return redirect()->route('penjual.product.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the image
        if ($product->foto != null) {
            if ($product->foto != 'default/product.jpeg') {
                File::delete(public_path() . '/' . $product->foto);
            }
        }

        Product::destroy($product->id);
        return redirect()->route('penjual.product.index');
    }
}
