@extends('layouts.app')

@section('content')
<section class="px-16 py-20">
    <h1 class="text-4xl uppercase tracking-wider mb-12">Cart</h1>

    @if(count($cart) > 0)

        <table class="w-full border">
            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Qty</th>
                    <th class="p-3">Total</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp

                @foreach($cart as $id => $item)
                    @php
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    @endphp
                    <tr class="border-b">
                        <td class="p-3">{{ $item['name'] }}</td>
                        <td class="p-3 text-center">
                            IDR {{ number_format($item['price'],0,',','.') }}
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('cart.decrease', $id) }}">−</a>
                            <span class="mx-2">{{ $item['quantity'] }}</span>
                            <a href="{{ route('cart.increase', $id) }}">+</a>
                        </td>
                        <td class="p-3 text-center">
                            IDR {{ number_format($total,0,',','.') }}
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('cart.remove', $id) }}" class="text-red-500">
                                Remove
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-6 text-lg">
            <strong>
                Grand Total: IDR {{ number_format($grandTotal,0,',','.') }}
            </strong>
        </div>

        <div class="text-right mt-6">
            <a href="{{ url('/checkout') }}"
            class="border px-6 py-2 inline-block btn-hover">
                Checkout
            </a>
        </div>

    @else
        <p>Cart kosong.</p>
    @endif
</section>
@endsection
