<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!session('user_logged_in')) {
            return redirect()->route('login');
        }

        $items = session()->get('cart', []);

        if (count($items) === 0) {
            return redirect('/cart')->with('error', 'Cart masih kosong');
        }

        $user = \App\Models\User::find(session('user_id'));

        return view('pages.checkout', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone'   => 'required',
            'address' => 'required',
        ]);

        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $user = \App\Models\User::find(session('user_id'));

        $order = Order::create([
            'user_id' => session('user_id'),
            'name'    => $user->name,
            'email'   => $user->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'total'   => $total,
            'status'  => 'pending',
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'price'      => $item['price'],
                'qty'        => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect('/order-success');
    }
}
