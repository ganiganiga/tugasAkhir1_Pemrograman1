<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | VISION STREAM</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-white text-black font-sans">

 <section class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md border p-10">
        <div class="text-center mb-10">
                <h1 class="text-3xl tracking-widest font-semibold">
                    VISION STREAM
                </h1>
                <p class="text-sm text-gray-500 mt-2">
                    Admin Panel
                </p>
            </div>

        <form method="POST" action="/admin/login" method="post" class="space-y-6">
            @csrf

            <input
                type="email"
                name="email"
                placeholder="Admin Email"
                class="w-full border px-4 py-3"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full border px-4 py-3"
                required
            >

            <button
                type="submit"
                class="w-full bg-black text-white py-3 uppercase"
            >
                Login
            </button>
        </form>

        <p class="text-center text-xs text-gray-400 mt-8">
            © {{ date('Y') }} Vision Stream
        </p>
    </div>
</section>

</body>
</html>
