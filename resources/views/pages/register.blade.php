@extends('layouts.app')

@section('content')

<section class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md border p-10">
        <h1 class="text-3xl uppercase tracking-widest mb-10 text-center">
            Sign Up
        </h1>

        <form method="POST" action="/register" class="space-y-6">
            @csrf

            @if($errors->any())
                <div class="text-red-500 text-center">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="text-green-500 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <input
                type="text"
                name="name"
                placeholder="Full Name"
                class="w-full border px-4 py-3 focus:outline-none"
                required
                value="{{ old('name') }}"
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                class="w-full border px-4 py-3 focus:outline-none"
                required
                value="{{ old('email') }}"
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full border px-4 py-3 focus:outline-none"
                required
            >

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="w-full border px-4 py-3 focus:outline-none"
                required
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
