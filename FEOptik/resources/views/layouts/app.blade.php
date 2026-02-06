<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eyewear Studio</title>

    {{-- VITE ASSETS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- BOOTSTRAP ICONS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white text-black font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- SEARCH OVERLAY --}}
    <div id="searchOverlay" class="fixed inset-0 bg-white z-50 hidden">
        <div class="max-w-3xl mx-auto px-6 py-20">

            <div class="flex items-center border-b pb-4">
                <input
                    id="searchInput"
                    type="text"
                    placeholder="Search eyewear"
                    class="w-full text-2xl outline-none"
                    onkeyup="filterProducts()"
                >

                <button onclick="closeSearch()" class="text-xl ml-4">
                    <i class="bi bi-x"></i>
                </button>
            </div>

            {{-- SEARCH RESULT --}}
            <div
                id="searchResult"
                class="mt-10 grid grid-cols-2 md:grid-cols-3 gap-6">
            </div>

        </div>
    </div>
    {{-- END SEARCH OVERLAY --}}

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('components.footer')

    {{-- SEARCH SCRIPT (FRONTEND ONLY) --}}
    <script>
        const products = [
            {
                name: "Vanilla 01",
                image: "/img/product-1.jpg",
                url: "/product/1"
            },
            {
                name: "Black Peter",
                image: "/img/product-2.jpg",
                url: "/product/2"
            },
            {
                name: "Maison 02",
                image: "/img/product-3.jpg",
                url: "/product/3"
            }
        ];

        function openSearch() {
            const overlay = document.getElementById('searchOverlay');
            overlay.classList.remove('hidden');
            document.getElementById('searchInput').focus();
            renderProducts(products);
        }

        function closeSearch() {
            document.getElementById('searchOverlay').classList.add('hidden');
        }

        function filterProducts() {
            const keyword = document
                .getElementById('searchInput')
                .value
                .toLowerCase();

            const filtered = products.filter(p =>
                p.name.toLowerCase().includes(keyword)
            );

            renderProducts(filtered);
        }

        function renderProducts(list) {
            const container = document.getElementById('searchResult');
            container.innerHTML = '';

            if (list.length === 0) {
                container.innerHTML =
                    `<p class="text-gray-500 col-span-full">No results found</p>`;
                return;
            }

            list.forEach(p => {
                container.innerHTML += `
                    <a href="${p.url}" class="group block">
                        <div class="overflow-hidden">
                            <img
                                src="${p.image}"
                                class="w-full h-48 object-cover
                                       transition duration-500 group-hover:scale-110">
                        </div>
                        <p class="mt-2 text-sm tracking-wide">${p.name}</p>
                    </a>
                `;
            });
        }

        document.addEventListener('keydown', e => {
            if (e.key === "Escape") closeSearch();
        });
    </script>

</body>
</html>
