@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-8">

        @include('partials.header')

        <!-- Judul -->
        <h1 class="text-2xl font-bold text-center text-gray-800">Anggota</h1>

        <!-- Filter Tombol -->
        <div class="flex justify-center gap-3">
            <button
                class="px-5 py-2 bg-[#933636] text-white rounded-full text-sm font-medium shadow hover:bg-[#7c2f2f] transition">Semua</button>
            <button
                class="px-5 py-2 bg-gray-300 text-gray-800 rounded-full text-sm font-medium shadow hover:bg-gray-400 transition">Pengurus</button>
            <button
                class="px-5 py-2 bg-gray-300 text-gray-800 rounded-full text-sm font-medium shadow hover:bg-gray-400 transition">Anggota</button>
        </div>

        <!-- Grid Anggota -->
        <div class="grid grid-cols-3 gap-6  justify-items-center">
            @foreach (range(1, 6) as $i)
                <div class="bg-white rounded-xl shadow-md overflow-hidden w-56 hover:shadow-lg transition">
                    <img src="https://via.placeholder.com/300x350" alt="Foto Anggota" class="w-full h-64 object-cover">
                    <div class="p-3 bg-[#f0f0d8] text-center">
                        <p class="font-semibold text-gray-800">Nama</p>
                        <p class="text-sm text-gray-600">Jabatan</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Load More -->
        <div class="flex justify-center">
            <button
                class="mt-4 px-6 py-2 bg-white border border-gray-300 rounded-full shadow-sm hover:bg-gray-100 transition">
                Load more
            </button>
        </div>

        <!-- Agenda & Presensi -->
        <div class="bg-white rounded-2xl p-6 mt-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2
                    class="font-semibold text-lg text-gray-800">
                    Agenda & Presensi
                </h2>

                <div class="flex items-center gap-2">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input type="text" placeholder="Cari agenda..."
                            class="pl-8 pr-3 py-1 text-sm bg-[#4b4b4b] text-white rounded-md focus:ring-2 focus:ring-[#933636] focus:outline-none placeholder-gray-300" />
                        <i class="fas fa-search absolute left-2 top-1/2 -translate-y-1/2 text-gray-300"></i>
                    </div>

                    <!-- Filter Button -->
                    <button class="px-4 py-1 bg-[#4b4b4b] text-white text-sm rounded-md hover:bg-[#3a3a3a] transition">
                        Filter
                    </button>
                </div>
            </div>

            <!-- Grid agenda -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <!-- Item 1 -->
                <div class="bg-[#f4f8e8] border border-gray-300 rounded-xl p-4 shadow-sm flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-800">Rapat Bulanan</p>
                        <p class="text-sm text-gray-600">10 Sep 2025 | 10:00 WITA</p>
                        <p class="text-xs bg-[#933636] text-white inline-block px-3 py-1 mt-2 rounded-full font-medium">
                            Gedung SBS
                        </p>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>

                <!-- Item 2 -->
                <div class="bg-[#f4f8e8] border border-gray-300 rounded-xl p-4 shadow-sm flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-800">Rapat Event</p>
                        <p class="text-sm text-gray-600">15 Sep 2025 | 13:00 WITA</p>
                        <p class="text-xs bg-[#933636] text-white inline-block px-3 py-1 mt-2 rounded-full font-medium">
                            Gedung A1
                        </p>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>

                <!-- Item 3 -->
                <div class="bg-[#f4f8e8] border border-gray-300 rounded-xl p-4 shadow-sm flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-800">Rapat Bulanan</p>
                        <p class="text-sm text-gray-600">20 Sep 2025 | 09:00 WITA</p>
                        <p class="text-xs bg-[#933636] text-white inline-block px-3 py-1 mt-2 rounded-full font-medium">
                            Gedung SBS
                        </p>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- Load more -->
            <div class="flex justify-center mt-4">
                <button class="text-sm px-4 py-1 bg-white rounded-full shadow hover:bg-gray-50">
                    Load more
                </button>
            </div>
        </div>
    @endsection
