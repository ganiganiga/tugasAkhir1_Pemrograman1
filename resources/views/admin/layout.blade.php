<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Berkah Lens</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

<!-- SIDEBAR -->
<aside class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b
from-gray-600 to-gray-800 text-white shadow-xl z-50">

    <div class="p-6">
        <div class="flex items-center mb-8">
            <i class="bi bi-shield-check text-2xl mr-3"></i>
            <h2 class="text-xl font-bold tracking-wide">ADMIN PANEL</h2>
        </div>

        <nav class="space-y-2">
            <a href="/admin/dashboard"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-700
               {{ request()->is('admin/dashboard') ? 'bg-gray-700' : '' }}">
                <i class="bi bi-speedometer2 mr-3"></i>
                Dashboard
            </a>

            <a href="/admin/products"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-700
               {{ request()->is('admin/products*') ? 'bg-gray-700' : '' }}">
                <i class="bi bi-box-seam mr-3"></i>
                Produk
            </a>

            <a href="/admin/orders"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-700
               {{ request()->is('admin/orders*') ? 'bg-gray-700' : '' }}">
                <i class="bi bi-receipt mr-3"></i>
                Pesanan
            </a>
        </nav>
    </div>

    <div class="absolute bottom-0 w-64 p-6">
        <p class="text-center text-sm text-gray-300 mb-2">Logged in as</p>
        <p class="text-center font-medium mb-4">{{ session('admin_name') }}</p>

        <form action="/admin/logout" method="POST">
            @csrf
            <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
                <i class="bi bi-box-arrow-right mr-1"></i> Logout
            </button>
        </form>
    </div>
</aside>

<!-- CONTENT AREA -->
<div style="padding-left:256px; min-height:100vh; display:flex; flex-direction:column;">

    <!-- TOP BAR -->
    <header class="bg-white shadow px-6 py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Berkah Lens Admin</h1>
            <span class="text-gray-600">{{ now()->format('l, d M Y') }}</span>
        </div>
    </header>

    <!-- PAGE CONTENT -->
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        @yield('content')
    </main>

</div>

</body>
</html>
