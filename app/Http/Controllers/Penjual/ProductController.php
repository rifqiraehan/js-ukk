<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil produk hanya jika user_id sama dengan id user saat ini
        $products = Product::where('user_id', auth()->user()->id)->paginate(8);

        return view('penjual.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjual.product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // handle the uploaded image
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/product', $fileName);
        }

        // Add the user_id to the request data
        $validated['user_id'] = Auth::id();

        $product = Product::create($validated);
        return redirect()->route('penjual.product.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        return view('penjual.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        return view('penjual.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('penjual.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        return redirect()->route('penjual.product.index');
    }
}
