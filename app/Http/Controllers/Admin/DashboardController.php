<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $orders = Order::where('status', 'pending')->get();
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        return view('admin.dashboard', compact('products', 'orders', 'totalRevenue'));
    }
}
