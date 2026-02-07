@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-20">

    <h1 class="text-2xl tracking-widest mb-12">CHECKOUT</h1>

    <div class="grid md:grid-cols-2 gap-16">

        <!-- LEFT : FORM -->
        <div>
            <h2 class="tracking-wide mb-6">Customer Information</h2>

            <div class="space-y-6">
                <input type="text" placeholder="Full Name"
                       class="w-full border-b py-2 outline-none">

                <input type="email" placeholder="Email"
                       class="w-full border-b py-2 outline-none">

                <input type="text" placeholder="Phone Number"
                       class="w-full border-b py-2 outline-none">

                <textarea placeholder="Shipping Address"
                          class="w-full border-b py-2 outline-none"></textarea>
            </div>

            <!-- PAYMENT -->
            <h2 class="tracking-wide mt-12 mb-6">Payment Method</h2>

            <div class="space-y-4 text-sm">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="radio" name="payment" checked>
                    Credit / Debit Card
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="radio" name="payment">
                    Bank Transfer
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="radio" name="payment">
                    E-Wallet
                </label>
            </div>
        </div>

        <!-- RIGHT : ORDER SUMMARY -->
        <div>
            <h2 class="tracking-wide mb-6">Order Summary</h2>

            <div id="checkoutItems" class="space-y-6"></div>

            <div class="border-t pt-6 mt-6 flex justify-between">
                <span>Total</span>
                <span id="checkoutTotal">IDR 0</span>
            </div>

            <button onclick="placeOrder()"
                    class="border w-full py-4 uppercase mt-10 btn-hover">
                Place Order
            </button>
        </div>

    </div>

</div>

<script src="/js/checkout.js"></script>
@endsection
