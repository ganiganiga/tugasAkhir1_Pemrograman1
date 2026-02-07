<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Tampilkan halaman checkout
     */
    public function checkoutPage()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty!');
        }

        $grandTotal = 0;
        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        return view('pages.checkout', compact('cart', 'grandTotal'));
    }


    /**
     * Simpan order ke database
     */
    public function store(Request $request)
    {
        // Validasi input checkout
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'total'          => 'required|numeric|min:1',
            'products'       => 'required|array',
        ]);

        // Loop setiap produk di cart dan simpan ke tabel orders
        foreach ($request->products as $product) {
            Order::create([
                'customer_name'  => $request->customer_name,
                'customer_email' => $request->customer_email,
                'phone'          => $request->phone,
                'address'        => $request->address,
                'payment_method' => $request->payment_method,
                'product_id'     => $product['id'],
                'total'          => $product['quantity'] * $product['price'], // total per item
                'status'         => 'pending'
            ]);
        }

        // Kosongkan cart setelah checkout
        session()->forget('cart');

        // Redirect ke shop dengan pesan sukses
        return redirect()->route('shop.index')
                         ->with('success', 'Order berhasil dibuat!');
    }
}
