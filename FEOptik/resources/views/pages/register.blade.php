@extends('layouts.app')

@section('content')

<section class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md border p-10">
        <h1 class="text-3xl uppercase tracking-widest mb-10 text-center">
            Sign Up
        </h1>

        <form class="space-y-6">
            <input
                type="text"
                placeholder="Full Name"
                class="w-full border px-4 py-3 focus:outline-none"
            >

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
                Create Account
            </button>
        </form>

        <p class="text-sm text-center mt-8">
            Already have an account?
            <a href="/login" class="underline">Login</a>
        </p>
    </div>
</section>

@endsection
