@extends('admin.layout')

@section('content')

<div class="p-8 bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Kelola Produk</h1>
                <p class="text-gray-600">Total {{ $products->count() }} produk</p>
            </div>
            <a href="/admin/products/create"
               class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors flex items-center gap-2">
                <i class="bi bi-plus-circle"></i>
                Tambah Produk
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <!-- Product Image -->
                <div class="relative">
                    <img src="{{ $product->image }}"
                         class="w-full h-48 object-cover"
                         alt="{{ $product->name }}">
                    @if($product->collection)
                    <span class="absolute top-2 left-2 bg-gray-500 text-white text-xs px-2 py-1 rounded-full">
                        {{ $product->collection }}
                    </span>
                    @endif
                    <span class="absolute top-2 right-2 
                        'bg-green-600' : 'bg-red-600' }}
                        text-black text-xs px-2 py-1 rounded-full shadow">
                        Stok: {{ $product->stok }}
                    </span>
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-1 truncate">{{ $product->name }}</h3>
                    <p class="text-lg font-bold text-blue-600 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                    @if($product->description)
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ Str::limit($product->description, 60) }}</p>
                    @endif

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="/admin/products/{{ $product->id }}/edit"
                           class="flex-1 bg-gray-100 text-gray-700 px-3 py-2 rounded-lg hover:bg-gray-200 transition-colors text-center text-sm">
                            <i class="bi bi-pencil mr-1"></i>Edit
                        </a>
                        <form action="/admin/products/{{ $product->id }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus produk ini?')"
                              class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-red-100 text-red-700 px-3 py-2 rounded-lg hover:bg-red-200 transition-colors text-sm">
                                <i class="bi bi-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <i class="bi bi-box-seam text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada produk</h3>
                    <p class="text-gray-600 mb-4">Mulai tambahkan produk pertama Anda</p>
                    <a href="/admin/products/create"
                       class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors inline-flex items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Produk Pertama
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
