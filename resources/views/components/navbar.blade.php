<nav id="navbar"
     class="w-full fixed top-0 left-0 z-50
            text-sm tracking-wide
            bg-transparent text-black
            transition-all duration-300">

    <div class="max-w-[1400px] mx-auto px-14 h-20 grid grid-cols-3 items-center">

        <!-- LEFT -->
        <div class="hidden md:flex gap-8 uppercase justify-self-start">
            <a href="/collection" class="nav-hover">Collections</a>
            <a href="/shop" class="nav-hover">Shop</a>
        </div>

        <!-- CENTER -->
        <div class="text-center text-2xl font-semibold tracking-widest justify-self-center">
            <a href="/">BERKAH LENS</a>
        </div>

        <!-- RIGHT -->
        <div class="flex justify-self-end items-center gap-6 text-lg">

            <button onclick="openSearch()" class="nav-hover">
                <i class="bi bi-search"></i>
            </button>

            @if(session('user_logged_in'))
                <a href="/profile" class="nav-hover">
                    <i class="bi bi-person"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="nav-hover">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            @else
                <a href="/login" class="nav-hover">
                    <i class="bi bi-person"></i>
                </a>
            @endif

            <a href="/cart" class="relative nav-hover">
                <i class="bi bi-bag"></i>
                @php
                    $cart = session('cart', []);
                    $totalQuantity = 0;
                    foreach ($cart as $item) {
                        $totalQuantity += $item['quantity'];
                    }
                @endphp
                @if($totalQuantity > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] rounded-full px-1">{{ $totalQuantity }}</span>
                @endif
            </a>

            <!-- MOBILE TOGGLE -->
            <button id="menuBtn" class="md:hidden text-xl">
                <i class="bi bi-list"></i>
            </button>
        </div>

    </div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu"
         class="hidden md:hidden border-t bg-white/90 backdrop-blur-md text-black">
        <div class="flex flex-col px-10 py-6 gap-4 uppercase">
            <a href="/shop" class="nav-hover">Shop</a>
            <a href="/collection" class="nav-hover">Collections</a>
            <a href="/cart" class="nav-hover">Cart</a>

            @if(session('user_logged_in'))
                <a href="/profile" class="nav-hover">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-hover text-left">Logout</button>
                </form>
            @else
                <a href="/login" class="nav-hover">Login</a>
                <a href="/register" class="nav-hover">Sign Up</a>
            @endif
        </div>
    </div>
</nav>

<script>
    document.getElementById('menuBtn')?.addEventListener('click', () => {
        document.getElementById('mobileMenu')?.classList.toggle('hidden');
    });
</script>