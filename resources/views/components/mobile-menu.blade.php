<div id="mobileMenu" class="hidden fixed inset-0 bg-white z-40 p-10">
    <button class="mb-10 text-xl" onclick="toggleMenu()">✕</button>

    <div class="flex flex-col gap-6 text-xl uppercase">
        <a href="/shop">Shop</a>
        <a href="/collection">Collections</a>
        <a href="/cart">Cart</a>

        @if(session('user_logged_in'))
            <a href="/profile">Profile</a>
            <a href="/logout">Logout</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Sign Up</a>
        @endif
    </div>
</div>
