<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * List products
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'price'        => 'required|integer',
            'image'        => 'required|string',
            'image_hover'  => 'nullable|string',
            'description' => 'nullable|string',
            'collection'   => 'nullable|string',
            'stok'         => 'nullable|integer',
        ]);

        Product::create([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'price'        => $request->price,
            'image'        => $request->image,
            'image_hover'  => $request->image_hover,
            'description' => $request->description,
            'collection'   => $request->collection,
            'stok'         => $request->stok,
        ]);

        return redirect('/admin/products')
            ->with('success', 'Product created successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update product
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric',
            'image'        => 'required|string',
            'image_hover'  => 'nullable|string',
            'description' => 'nullable|string',
            'collection'   => 'nullable|string',
            'stok'         => 'nullable|integer',
        ]);

        $product->update([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'price'        => $request->price,
            'image'        => $request->image,
            'image_hover'  => $request->image_hover,
            'description' => $request->description,
            'collection'   => $request->collection,
            'stok'         => $request->stok
        ]);

        return redirect('/admin/products')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Delete product
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted');
    }
}
