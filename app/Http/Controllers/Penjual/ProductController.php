<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil produk hanya jika user_id sama dengan id user saat ini
        $products = Product::where('user_id', auth()->user()->id)->paginate(8);

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
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('product'), $fileName);
            $validated['foto'] = 'product/'.$fileName;
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
        return view('penjual.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            // Handle the uploaded image
            $file = $request->file('foto');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();

            $path = $file->storeAs('product/', $fileName);

            // Delete the old image
            Storage::delete($product->foto);

            // Update the product's image path in the database
            $validated['foto'] = $fileName;
        } else {
            // Keep the existing image path
            $validated['foto'] = $product->foto;
        }


        $product->update($validated);
        return redirect()->route('penjual.product.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the image
        Storage::delete($product->foto);

        Product::destroy($product->id);
        return redirect()->route('penjual.product.index');
    }
}
