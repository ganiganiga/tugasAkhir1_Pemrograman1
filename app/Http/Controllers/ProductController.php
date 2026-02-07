<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('pages.shop', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.product-detail', compact('product'));
    }
}
