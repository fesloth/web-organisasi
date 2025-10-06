@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">
@include('partials.header')

<div class="min-h-screen bg-[#F3F7E8] px-8 py-6">
    <h1 class="text-2xl font-semibold text-center mb-6">Event</h1>

    <!-- Tabs Status -->
    <div class="flex justify-center gap-3 mb-8">
        @foreach(['Semua', 'Mendatang', 'Berlangsung', 'Selesai'] as $status)
            <a href="?status={{ strtolower($status) }}"
                class="px-6 py-2 rounded-lg text-sm font-medium transition 
                {{ request('status') == strtolower($status) || (!request('status') && $loop->first) ? 'bg-red-400 text-white' : 'bg-white text-gray-700' }}">
                {{ $status }}
            </a>
        @endforeach
    </div>

    <!-- Grid Event -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
            <div class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <img src="{{ $event->gambar ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $event->nama }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $event->nama }}</h3>
                    <p class="text-sm text-gray-500">{{ $event->tanggal_mulai->format('j M Y') }} - {{ $event->tanggal_selesai->format('j M Y') }}</p>
                    <p class="text-xs text-gray-400 mt-1">Lokasi: {{ $event->lokasi }}</p>

                    <span class="text-xs px-2 py-1 mt-3 inline-block rounded-full
                        @if($event->status == 'Berlangsung') bg-red-400 text-white
                        @elseif($event->status == 'Mendatang') bg-yellow-400 text-white
                        @else bg-green-500 text-white @endif">
                        {{ $event->status }}
                    </span>

                    <div class="mt-3">
                        <div class="w-full bg-gray-100 rounded-full h-2">
                            <div class="bg-red-400 h-2 rounded-full" style="width: {{ $event->progress }}%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">{{ $event->progress }}%</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol Load More -->
    <div class="flex justify-center mt-8">
        <button class="px-4 py-2 bg-white text-gray-700 rounded-full border hover:bg-gray-100">
            Load more
        </button>
    </div>
</div>
</div>
@endsection
