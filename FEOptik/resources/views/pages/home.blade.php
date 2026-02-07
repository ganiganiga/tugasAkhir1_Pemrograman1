@extends('layouts.app')

@section('content')

<section class="relative h-screen overflow-hidden group">

    <!-- IMAGE 1 -->
    <img
        src="/img/model-1.jpg"
        class="absolute inset-0 w-full h-full object-cover
               opacity-100 group-hover:opacity-0
               transition duration-700 ease-in-out"
    >

    <!-- IMAGE 2 (HOVER) -->
    <img
        src="/img/model-1-hover.jpg"
        class="absolute inset-0 w-full h-full object-cover
               opacity-0 group-hover:opacity-100
               transition duration-700 ease-in-out"
    >

    <!-- OVERLAY (TEXT + BUTTON) -->
    <div class="relative z-10 h-full flex items-center justify-center text-center">
        <div class="hero-slide bg-white/70 backdrop-blur-sm px-12 py-10">
            <h1 class="text-5xl md:text-6xl tracking-widest font-light mb-6">
                SEE DIFFERENTLY
            </h1>
            <p class="text-gray-700 mb-10">
                Eyewear inspired by fashion & art
            </p>
            <a href="/shop"
               class="border px-10 py-3 uppercase text-sm btn-hover">
                Shop Now
            </a>
        </div>
    </div>

</section>

<section class="px-16 py-24">
    <h2 class="text-3xl uppercase tracking-wider mb-12">
        Featured Collection
    </h2>

    <div class="grid grid-cols-3 gap-12">
        <div class="bg-gray-100 h-[400px]"></div>
        <div class="bg-gray-100 h-[400px]"></div>
        <div class="bg-gray-100 h-[400px]"></div>
    </div>
</section>

@endsection
