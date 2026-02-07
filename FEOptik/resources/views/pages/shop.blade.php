@extends('layouts.app')

@section('content')

<section class="px-16 py-20">
    <h1 class="text-4xl uppercase tracking-wider mb-16">
        Shop
    </h1>

    <div class="grid grid-cols-4 gap-12">
        @for ($i = 0; $i < 8; $i++)
            @include('components.product-card', [
                'name' => 'Eyewear Model',
                'price' => '1.250.000',
                'image' => 'https://via.placeholder.com/400x500'
            ])
        @endfor
    </div>
</section>

@endsection
