@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-[#f0f0d8]">
    <form action="{{ route('register') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-md w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-[#933636]">Register</h2>

        @if (session('success'))
            <div class="text-green-600 mb-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <label class="block mb-2 text-sm">Nama</label>
        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#933636]">

        <label class="block mb-2 text-sm">Email</label>
        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#933636]">

        <label class="block mb-2 text-sm">Password</label>
        <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#933636]">

        <button type="submit" class="w-full cursor-pointer bg-[#933636] text-white py-2 rounded-lg hover:bg-[#7b2c2c] transition">
            Register
        </button>

        <p class="text-center text-sm mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-[#933636] font-semibold hover:underline">Login</a>
        </p>
    </form>
</div>
@endsection
