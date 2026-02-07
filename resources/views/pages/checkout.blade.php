@extends('layouts.app')

@section('content')
<section class="px-16 py-20">
    <h1 class="text-4xl mb-10">Checkout</h1>

    @php $grandTotal = 0; @endphp

    <table class="w-full border mb-8">
        @foreach($items as $item)
            @php
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }} x IDR {{ number_format($item['price']) }}</td>
                <td>IDR {{ number_format($total) }}</td>
            </tr>
        @endforeach
    </table>

    <div class="text-right mb-6 font-semibold">
        Total: IDR {{ number_format($grandTotal) }}
    </div>

    <button onclick="openModal()" class="border px-6 py-3 w-full">
        Place Order
    </button>

    <!-- Modal -->
    <div id="checkoutModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium text-gray-900">Checkout Form</h3>
                <form action="{{ route('checkout.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input name="name" value="{{ $user->name }}" placeholder="Full Name" class="border p-2 w-full mb-2" readonly>
                    <input name="email" type="email" value="{{ $user->email }}" placeholder="Email" class="border p-2 w-full mb-2" readonly>
                    <input name="phone" placeholder="Phone Number" class="border p-2 w-full mb-2" required>
                    <textarea name="address" placeholder="Address" class="border p-2 w-full mb-2" required></textarea>
                    <div class="flex items-center px-4 py-3">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Place Order
                        </button>
                        <button type="button" onclick="closeModal()" class="ml-3 px-4 py-2 bg-gray-300 text-gray-900 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function openModal() {
    document.getElementById('checkoutModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('checkoutModal').classList.add('hidden');
}
</script>
@endsection
