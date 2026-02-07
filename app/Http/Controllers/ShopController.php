<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database atau filter berdasarkan collection
        $query = Product::query();

        if (request('collection')) {
            $query->where('collection', request('collection'));
        }

        $products = $query->get();
        $collection = request('collection');
        return view('pages.shop', compact('products', 'collection')); // kirim $products dan $collection ke view
    }
}
