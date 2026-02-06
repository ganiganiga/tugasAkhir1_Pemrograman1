const checkoutItems = document.getElementById("checkoutItems");
const checkoutTotal = document.getElementById("checkoutTotal");

let cart = JSON.parse(localStorage.getItem("cart")) || [];

function formatRupiah(num) {
    return "IDR " + num.toLocaleString("id-ID");
}

function renderCheckout() {
    let total = 0;
    checkoutItems.innerHTML = "";

    if (cart.length === 0) {
        checkoutItems.innerHTML =
            `<p class="text-gray-500">No items in cart</p>`;
        checkoutTotal.innerText = formatRupiah(0);
        return;
    }

    cart.forEach(item => {
        total += item.price * item.qty;

        checkoutItems.innerHTML += `
            <div class="flex justify-between text-sm">
                <span>${item.name} × ${item.qty}</span>
                <span>${formatRupiah(item.price * item.qty)}</span>
            </div>
        `;
    });

    checkoutTotal.innerText = formatRupiah(total);
}

function placeOrder() {
    alert("Order placed successfully!");
    localStorage.removeItem("cart");
    window.location.href = "/";
}

renderCheckout();
