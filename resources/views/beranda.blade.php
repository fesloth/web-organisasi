@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-6">

        {{-- Header --}}
        @include('partials.header')

        <!-- Menu Cards -->
        <div class="grid grid-cols-4 gap-4 bg-[#933636] p-4 rounded-2xl">
            <div class="bg-gray-200 h-16 rounded-xl"></div>
            <div class="bg-gray-200 h-16 rounded-xl"></div>
            <div class="bg-gray-200 h-16 rounded-xl"></div>
            <div class="bg-gray-200 h-16 rounded-xl"></div>
        </div>

        <!-- Agenda & Jadwal -->
        <div class="grid grid-cols-2 gap-4 bg-[#933636] p-4 rounded-2xl text-white">
            <div>
                <h2 class="font-semibold mb-2">Agenda & Kalender</h2>
                <div class="bg-[#f0f0d8] text-gray-800 rounded-lg p-4">
                    <div class="grid grid-cols-7 text-center text-sm font-medium mb-2">
                        <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                    </div>
                    <div class="grid grid-cols-7 text-center text-sm gap-y-2">
                        @for ($i = 1; $i <= 30; $i++)
                            <span class="text-gray-700">{{ $i }}</span>
                        @endfor
                    </div>
                </div>
            </div>

            <div>
                <h2 class="font-semibold mb-2">Jadwal Hari Ini</h2>
                <div class="bg-[#f0f0d8] text-gray-800 rounded-lg p-4 space-y-3">
                    <div class="h-12 bg-gray-200 rounded-xl"></div>
                    <div class="h-12 bg-gray-200 rounded-xl"></div>
                    <div class="h-12 bg-gray-200 rounded-xl"></div>
                </div>
            </div>
        </div>

        <!-- News & Presensi -->
        <div class="grid grid-cols-2 gap-4">
            <!-- News -->
            <div class="bg-[#933636] rounded-2xl p-4 text-white">
                <h2 class="font-semibold mb-3">News</h2>
                <div class="space-y-2">
                    <div class="bg-gray-400 h-24 rounded-xl shadow-inner"></div>
                    <div class="bg-gray-300 h-24 rounded-xl"></div>
                    <div class="bg-gray-500 h-24 rounded-xl"></div>
                </div>
            </div>

            <!-- Presensi -->
            <div class="bg-[#933636] rounded-2xl p-4 text-white">
                <h2 class="font-semibold mb-3">Presensi</h2>
                <div class="bg-[#f0f0d8] text-gray-800 rounded-xl p-3 flex justify-between items-center mb-2">
                    <div>
                        <p class="font-semibold">Rapat Bulanan</p>
                        <p class="text-xs text-gray-600">(2025-09-10)</p>
                    </div>
                    <span class="bg-[#933636] text-white text-xs px-3 py-1 rounded-full">Hadir</span>
                </div>
                <div class="bg-[#f0f0d8] text-gray-800 rounded-xl p-3 flex justify-between items-center">
                    <div>
                        <p class="font-semibold">Rapat Event</p>
                        <p class="text-xs text-gray-600">(Belum Dimulai)</p>
                    </div>
                    <span class="bg-gray-500 text-white text-xs px-3 py-1 rounded-full">Belum</span>
                </div>
            </div>
        </div>
    </div>
@endsection
