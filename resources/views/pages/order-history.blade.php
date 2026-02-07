@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Riwayat Pesanan</h1>

    @if($orders->count() > 0)
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Pesanan #{{ $order->id }}</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'completed') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-2">Tanggal: {{ $order->created_at->format('d M Y H:i') }}</p>
                    <p class="text-gray-600 mb-4">Total: Rp {{ number_format($order->total, 0, ',', '.') }}</p>

                    <h3 class="text-lg font-medium mb-2">Barang yang Dipesan:</h3>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }} - {{ $item->qty }} x Rp {{ number_format($item->price, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Belum ada pesanan.</p>
    @endif
</div>
@endsection
