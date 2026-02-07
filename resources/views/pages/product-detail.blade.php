@extends('layouts.app')

@section('content')

@php
    $product = \App\Models\Product::where('slug', $slug)->first();
@endphp

@if($product)
<section class="px-16 py-24">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- PRODUCT IMAGE -->
            <div class="relative h-[500px] overflow-hidden bg-gray-100">
                <img
                    src="{{ $product->image }}"
                    alt="{{ $product->name }}"
                    class="absolute inset-0 w-full h-full object-cover"
                >
            </div>

            <!-- PRODUCT INFO -->
            <div class="flex flex-col justify-center">
                <h1 class="text-3xl uppercase tracking-wider mb-4">
                    {{ $product->name }}
                </h1>
                <p class="text-2xl font-semibold mb-6">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <div class="mb-8">
                    <p class="text-gray-700 leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>
                <a href="{{ url('/cart/add/' . $product->id) }}" class="inline-block px-8 py-3 bg-black text-white text-sm uppercase tracking-wider hover:bg-gray-800 transition-colors">
                    Add to Cart
                </a>
            </div>

        </div>
    </div>
</section>
@else
<section class="px-16 py-24 text-center">
    <h1 class="text-3xl uppercase tracking-wider mb-4">
        Product Not Found
    </h1>
    <p class="text-gray-500 mb-8">
        The product you're looking for doesn't exist.
    </p>
    <a href="/" class="inline-block px-8 py-3 bg-black text-white text-sm uppercase tracking-wider hover:bg-gray-800 transition-colors">
        Back to Home
    </a>
</section>
@endif

@endsection
