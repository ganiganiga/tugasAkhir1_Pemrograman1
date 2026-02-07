@extends('layouts.app')

@section('content')

<section id="hero" class="relative h-screen overflow-hidden">
    <video autoplay muted loop playsinline
        class="absolute inset-0 w-full h-full object-cover">
        <source src="https://gm-prd-resource.gentlemonster.com/main/banner/745797614844190277/dc673826-17a9-4253-b4e5-d0f681db7017/main_0_pc_1920*990.mp4" type="video/mp4">
    </video>
</section>

<section class="px-16 py-24">
    <h2 class="text-3xl uppercase tracking-wider mb-12">
        Featured Products
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

        @foreach($products->take(3) as $product)
            <div class="group">

                <div class="relative h-[420px] overflow-hidden bg-gray-100">

                    <!-- IMAGE DEFAULT -->
                    <img
                        src="{{ $product->image }}"
                        alt="{{ $product->name }}"
                        class="absolute inset-0 w-full h-full object-cover
                               transition-opacity duration-500
                               group-hover:opacity-0"
                    >

                    <!-- IMAGE HOVER -->
                    <img
                        src="{{ $product->image_hover }}"
                        alt="{{ $product->name }}"
                        class="absolute inset-0 w-full h-full object-cover
                               opacity-0 group-hover:opacity-100
                               transition-opacity duration-500"
                    >
                </div>

                <div class="mt-4">
                    <h3 class="uppercase tracking-wider text-sm">
                        {{ $product->name }}
                    </h3>
                    <p class="text-gray-500 mt-1">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <a href="{{ url('/product/' . $product->slug) }}" class="inline-block mt-2 px-4 py-2 bg-black text-white text-sm uppercase tracking-wider hover:bg-gray-800 transition-colors">
                        View Product
                    </a>
                </div>

            </div>
        @endforeach

</section>

{{-- SCROLL SCRIPT KHUSUS HOME --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const hero = document.getElementById('hero');

    if (!navbar || !hero) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > hero.offsetHeight - navbar.offsetHeight) {
            navbar.classList.add(
                'bg-transparent',
                'backdrop-blur-md',
                'text-black',
                'shadow-sm'
            );
            navbar.classList.remove('bg-transparent', 'text-white');
        } else {
            navbar.classList.add('bg-transparent', 'text-white');
            navbar.classList.remove(
                'bg-transparent',
                'backdrop-blur-md',
                'text-black',
                'shadow-sm'
            );
        }
    });
});
</script>

@endsection
