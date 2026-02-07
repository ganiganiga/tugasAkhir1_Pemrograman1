const cartContainer = document.getElementById("cartItems");
const totalEl = document.getElementById("cartTotal");

let cart = JSON.parse(localStorage.getItem("cart")) || [];

function formatRupiah(num) {
    return "IDR " + num.toLocaleString("id-ID");
}

function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function renderCart() {
    cartContainer.innerHTML = "";
    let total = 0;

    if (cart.length === 0) {
        cartContainer.innerHTML =
            `<p class="text-gray-500">Your cart is empty</p>`;
        totalEl.innerText = formatRupiah(0);
        return;
    }

    cart.forEach(item => {
        total += item.price * item.qty;

        cartContainer.innerHTML += `
            <div class="flex items-center justify-between border-b pb-6">

                <div class="flex gap-6">
                    <img src="${item.image}"
                         class="w-28 h-28 object-cover">

                    <div>
                        <p class="tracking-wide">${item.name}</p>
                        <p class="text-sm text-gray-500">
                            ${formatRupiah(item.price)}
                        </p>

                        <!-- REMOVE -->
                        <button onclick="removeItem(${item.id})"
                                class="text-xs uppercase mt-3 text-gray-500 hover:underline">
                            Remove
                        </button>
                    </div>
                </div>

                <!-- QTY -->
                <div class="flex items-center gap-4">
                    <button onclick="decreaseQty(${item.id})"
                        class="border px-3 py-1">-</button>

                    <span>${item.qty}</span>

                    <button onclick="increaseQty(${item.id})"
                        class="border px-3 py-1">+</button>
                </div>

            </div>
        `;
    });

    totalEl.innerText = formatRupiah(total);
}

function increaseQty(id) {
    const item = cart.find(p => p.id === id);
    if (item) item.qty++;
    saveCart();
}

function decreaseQty(id) {
    const item = cart.find(p => p.id === id);
    if (item && item.qty > 1) {
        item.qty--;
    }
    saveCart();
}

function removeItem(id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
}

renderCart();
