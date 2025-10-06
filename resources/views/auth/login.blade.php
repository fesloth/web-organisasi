@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-[#f0f0d8]">
    <form action="{{ route('login') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-md w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-[#933636]">Login</h2>

        @if ($errors->any())
            <div class="text-red-600 mb-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <label class="block mb-2 text-sm">Email</label>
        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#933636]">

        <label class="block mb-2 text-sm">Password</label>
        <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#933636]">

        <button type="submit" class="w-full bg-[#933636] text-white py-2 rounded-lg hover:bg-[#7b2c2c] transition cursor-pointer">
            Login
        </button>

        <p class="text-center text-sm mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-[#933636] font-semibold hover:underline">Daftar</a>
        </p>
    </form>
</div>
@endsection
