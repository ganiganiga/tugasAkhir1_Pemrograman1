@extends('layouts.app')

@section('content')

<section class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md border p-10">
        <h1 class="text-3xl uppercase tracking-widest mb-10 text-center">
            Login
        </h1>

        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <input
                type="email"
                placeholder="Email"
                class="w-full border px-4 py-3 focus:outline-none"
            >

            <input
                type="password"
                placeholder="Password"
                class="w-full border px-4 py-3 focus:outline-none"
            >

            <button
                type="submit"
                class="w-full border py-3 uppercase hover:bg-black hover:text-white transition"
            >
                Login
            </button>
        </form>

        <p class="text-sm text-center mt-8">
            Don’t have an account?
            <a href="/register" class="underline">Sign Up</a>
        </p>
    </div>
</section>

@endsection
