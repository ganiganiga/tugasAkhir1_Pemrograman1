@extends('layouts.app')

@section('content')

<section class="px-16 py-24">
    <h1 class="text-5xl uppercase tracking-widest mb-20">
        Collection
    </h1>

    <div class="space-y-32">
        <div class="grid grid-cols-2 gap-16 items-center">
            <div class="bg-gray-100 h-[500px]"></div>
            <div>
                <h2 class="text-3xl uppercase mb-6">Noir Series</h2>
                <p class="text-gray-500 leading-relaxed">
                    Bold silhouettes inspired by modern architecture and dark aesthetics.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl uppercase mb-6">Aura Series</h2>
                <p class="text-gray-500 leading-relaxed">
                    Lightweight frames with minimal expression.
                </p>
            </div>
            <div class="bg-gray-100 h-[500px]"></div>
        </div>
    </div>
</section>

@endsection
