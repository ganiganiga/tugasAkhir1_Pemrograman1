<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function index()
    {
        if (!session('user_logged_in')) {
            return redirect()->route('login');
        }

        $orders = Order::where('user_id', session('user_id'))->with('items.product')->get();

        return view('pages.order-history', compact('orders'));
    }
}
