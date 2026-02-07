@extends('layouts.app')

@section('content')

<section class="px-16 py-24">
    <h1 class="text-5xl uppercase tracking-widest mb-20">
        Collection
    </h1>

    <div class="space-y-32">
        <div class="grid grid-cols-2 gap-16 items-center">
            <a href="{{ route('shop.index', ['collection' => '2026 Collection']) }}" class="block">
                <img src="https://gm-dev-resource.gentlemonster.com/catalog/category/sunglasses/image/74a04575-0eb8-4954-a666-65f6f9a10b0d/4.jentlesalon_collectionplp_pc.jpg" alt="2026 Collection" class="h-[500px] w-full object-cover hover:opacity-80 transition-opacity">
            </a>
            <div>
                <h2 class="text-3xl uppercase mb-6">2026 Collection</h2>
                <p class="text-gray-500 leading-relaxed">
                    Bold silhouettes inspired by modern architecture and dark aesthetics.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl uppercase mb-6">Salon Collection</h2>
                <p class="text-gray-500 leading-relaxed">
                    Lightweight frames with minimal expression.
                </p>
            </div>
            <a href="{{ route('shop.index', ['collection' => 'Salon Collection']) }}" class="block">
                <img src="https://gm-dev-resource.gentlemonster.com/catalog/category/sunglasses/image/a41deb6d-12e3-46f7-bb64-7f249df32511/7.24optical_collectionplp_pc.jpg" alt="Aura Series" class="h-[500px] w-full object-cover hover:opacity-80 transition-opacity">
            </a>
        </div>
    </div>
</section>

@endsection
