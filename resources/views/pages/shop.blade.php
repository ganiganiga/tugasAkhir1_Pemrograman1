@extends('layouts.app')

@section('content')
<section class="px-16 py-20">
    <h1 class="text-4xl uppercase tracking-wider mb-16">
        @if($collection)
            {{ ucfirst(str_replace('-', ' ', $collection)) }}
        @else
            Shop
        @endif
    </h1>

    <div class="grid grid-cols-4 gap-12">
        @foreach($products as $product)
        <div class="border p-4 flex flex-col justify-between">
            <img src="{{ $product->image ?? 'https://via.placeholder.com/400x500' }}" alt="{{ $product->name }}" class="mb-4">
            <h2 class="font-semibold mb-2">{{ $product->name }}</h2>
            <p class="font-bold mb-4">IDR {{ number_format($product->price,0,',','.') }}</p>
            <a href="{{ route('cart.add', $product->id) }}" class="border w-full py-2 mt-2 btn-hover text-center">
                Add to Cart
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection
