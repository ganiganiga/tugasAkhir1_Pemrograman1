<div class="border p-4 flex flex-col justify-between">
    <img src="{{ $image }}" alt="{{ $name }}" class="mb-4">
    <h2 class="font-semibold mb-2">{{ $name }}</h2>
    @if(isset($collection) && $collection)
        <p class="text-sm text-gray-600 mb-2">Collection: {{ ucfirst(str_replace('-', ' ', $collection)) }}</p>
    @endif
    <p class="font-bold mb-4">IDR {{ $price }}</p>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_id }}">
        <input type="hidden" name="total" value="{{ $price }}">
        <input type="hidden" name="customer_name" placeholder="Full Name" required>
        <input type="hidden" name="customer_email" placeholder="Email" required>
        <input type="hidden" name="phone">
        <input type="hidden" name="address">
        <input type="hidden" name="payment_method" value="Card">
        <button type="submit" class="border w-full py-2 mt-2 btn-hover">
            Buy Now
        </button>
    </form>
</div>
