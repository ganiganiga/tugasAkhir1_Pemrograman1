@extends('layouts.app')

@section('content')

<section class="px-16 py-24 max-w-3xl mx-auto">
    <h1 class="text-4xl uppercase tracking-wider mb-16">
        My Profile
    </h1>

    <form method="POST" action="/profile" class="space-y-8">
        @csrf

        <div>
            <label class="block text-sm uppercase mb-2">Full Name</label>
            <input
                name="name"
                value="{{ session('user_name', 'John Doe') }}"
                class="w-full border px-4 py-3"
            >
        </div>

        <div>
            <label class="block text-sm uppercase mb-2">Email</label>
            <input
                name="email"
                value="{{ session('user_email', 'john@email.com') }}"
                class="w-full border px-4 py-3"
            >
        </div>

        <button
            class="border px-10 py-3 uppercase hover:bg-black hover:text-white transition">
            Save Changes
        </button>
    </form>

    <div class="mt-12">
        <a href="/logout" class="text-sm underline">
            Logout
        </a>
    </div>
</section>

@endsection
