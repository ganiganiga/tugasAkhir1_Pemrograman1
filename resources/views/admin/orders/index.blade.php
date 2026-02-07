@extends('admin.layout')

@section('content')

<div class="p-8 bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Kelola Pesanan</h1>
            <p class="text-gray-600">Daftar pesanan yang masuk dari pelanggan</p>
        </div>

        @if($orders->count())
        <!-- Orders List -->
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <!-- Order Header -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Order #{{ $order->id }}</h3>
                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="text-right">
                        @if($order->status === 'pending')
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="bi bi-clock mr-1"></i>Pending
                            </span>
                        @else
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="bi bi-check-circle mr-1"></i>Selesai
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Pelanggan</p>
                        <p class="font-medium text-gray-900">{{ $order->name }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Telepon</p>
                        <p class="font-medium text-gray-900">{{ $order->phone }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 md:col-span-1">
                        <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Alamat</p>
                        <p class="font-medium text-gray-900 text-sm">{{ $order->address }}</p>
                    </div>
                </div>

                <!-- Products -->
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Produk Dipesan:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($order->items as $item)
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                            {{ $item->product->name }} ({{ $item->qty }}x)
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Total & Action -->
                <div class="flex justify-between items-center pt-4 border-t">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    </div>
                    @if($order->status === 'pending')
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors flex items-center gap-2">
                            <i class="bi bi-check-circle"></i>
                            Selesaikan Pesanan
                        </button>
                    </form>
                    @else
                    <span class="text-green-600 font-medium flex items-center gap-2">
                        <i class="bi bi-check-circle-fill"></i>
                        Pesanan Selesai
                    </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <i class="bi bi-receipt text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada pesanan</h3>
            <p class="text-gray-600">Pesanan dari pelanggan akan muncul di sini</p>
        </div>
        @endif
    </div>
</div>

@endsection
