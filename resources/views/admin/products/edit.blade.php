@extends('admin.layout')

@section('content')

<div class="p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Product</h1>

        <div class="bg-white rounded-lg shadow-sm border p-6">
            <form method="POST" action="/admin/products/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ $product->name }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price (IDR)</label>
                        <input
                            type="number"
                            name="price"
                            value="{{ $product->price }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Collection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Collection</label>
                        <select
                            name="collection"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                            <option value="">Select Collection</option>
                            <option value="Classic" {{ $product->collection == 'Classic' ? 'selected' : '' }}>Classic</option>
                            <option value="Modern" {{ $product->collection == 'Modern' ? 'selected' : '' }}>Modern</option>
                            <option value="Sport" {{ $product->collection == 'Sport' ? 'selected' : '' }}>Sport</option>
                            <option value="Kids" {{ $product->collection == 'Kids' ? 'selected' : '' }}>Kids</option>
                        </select>
                    </div>

                    <!-- Main Image URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Main Image URL</label>
                        <input
                            type="text"
                            name="image"
                            value="{{ $product->image }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Hover Image URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hover Image URL</label>
                        <input
                            type="text"
                            name="image_hover"
                            value="{{ $product->image_hover }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >{{ $product->description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                    <input
                        type="number"
                        name="stok"
                        value="{{ $product->stok }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                </div>

                <!-- Image Preview -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image Preview</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($product->image)
                        <div class="border rounded-lg p-2">
                            <p class="text-xs text-gray-500 mb-1">Main Image</p>
                            <img src="{{ $product->image }}" alt="Main" class="w-full h-32 object-cover rounded">
                        </div>
                        @endif
                        @if($product->image_hover)
                        <div class="border rounded-lg p-2">
                            <p class="text-xs text-gray-500 mb-1">Hover Image</p>
                            <img src="{{ $product->image_hover }}" alt="Hover" class="w-full h-32 object-cover rounded">
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Product
                    </button>
                    <a href="/admin/products" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
