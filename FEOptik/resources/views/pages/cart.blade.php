@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-20">

    <h1 class="text-2xl tracking-widest mb-10">CART</h1>

    <div id="cartItems" class="space-y-8"></div>

    <!-- TOTAL -->
    <div class="border-t pt-6 mt-10 flex justify-between items-center">
        <span class="tracking-wide">TOTAL</span>
        <span id="cartTotal" class="tracking-wide">IDR 0</span>
    </div>

    <!-- CHECKOUT -->
    <div class="mt-10 text-right">
        <a href="/checkout"
           class="border px-10 py-4 uppercase btn-hover inline-block">
            Checkout
        </a>
    </div>

</div>

<script src="/js/cart.js"></script>
@endsection
