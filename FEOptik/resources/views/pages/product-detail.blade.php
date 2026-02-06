@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-20">

    <div class="grid md:grid-cols-2 gap-16">

        <!-- IMAGE GALLERY -->
        <div>
            <!-- MAIN IMAGE -->
            <img id="mainImage"
                 src="{{ asset('img/product-1.jpg') }}"
                 class="w-full h-[500px] object-cover mb-6">

            <!-- THUMBNAILS -->
            <div class="flex gap-4">
                <img onclick="changeImage(this)"
                     src="{{ asset('img/product-1.jpg') }}"
                     class="w-20 h-20 object-cover cursor-pointer border">

                <img onclick="changeImage(this)"
                     src="{{ asset('img/product-1-2.jpg') }}"
                     class="w-20 h-20 object-cover cursor-pointer border">

                <img onclick="changeImage(this)"
                     src="{{ asset('img/product-1-3.jpg') }}"
                     class="w-20 h-20 object-cover cursor-pointer border">
            </div>
        </div>

        <!-- PRODUCT INFO -->
        <div>
            <h1 class="text-3xl tracking-widest mb-6">
                GM BLACK 01
            </h1>

            <p class="text-gray-600 mb-6">
                IDR 2.500.000
            </p>

            <p class="text-gray-700 leading-relaxed mb-10">
                A bold silhouette inspired by modern art and fashion.
                Designed for everyday confidence.
            </p>

            <button  onclick="addToCart()" 
                    class="border px-10 py-4 uppercase btn-hover">
                Add to bag
            </button>
        </div>

    </div>

</div>

<!-- SIMPLE JS -->
<script>
    function changeImage(el) {
        document.getElementById('mainImage').src = el.src;
    }

    function addToCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const product = {
        id: 1,
        name: "GM BLACK 01",
        price: 2500000,
        image: "/img/product-1.jpg",
        qty: 1
    };

    const existing = cart.find(p => p.id === product.id);

    if (existing) {
        existing.qty++;
    } else {
        cart.push(product);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    alert("Product added to cart");
}
</script>
@endsection
