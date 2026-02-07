@extends('admin.layout')

@section('content')

<div class="p-8 bg-gradient-to-br from-gray-50 to-gray-200">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Dashboard Admin</h1>
            <p class="text-gray-600">Selamat datang kembali, {{ session('admin_name') }}!</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- TOTAL PRODUCTS -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-gray-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Produk</p>
                        <h2 class="text-3xl font-bold text-gray-900 mt-1">{{ $products->count() }}</h2>
                    </div>
                    <div class="bg-gray-100 p-3 rounded-full">
                        <i class="bi bi-box-seam text-gray-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- TOTAL ORDERS -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-gray-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Pesanan Pending</p>
                        <h2 class="text-3xl font-bold text-gray-900 mt-1">{{ $orders->count() }}</h2>
                    </div>
                    <div class="bg-gray-100 p-3 rounded-full">
                        <i class="bi bi-receipt text-gray-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- TOTAL REVENUE -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-gray-500 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Pendapatan</p>
                        <h2 class="text-3xl font-bold text-gray-900 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                    </div>
                    <div class="bg-gray-100 p-3 rounded-full">
                        <i class="bi bi-cash-stack text-gray-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
