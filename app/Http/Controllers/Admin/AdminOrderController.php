<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'pending')->with(['user', 'items.product'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function update($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return redirect()->back()->with('success', 'Status order diperbarui');
    }
}
