@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">
@include('partials.header')

<div class="min-h-screen bg-[#F3F7E8] px-8 py-6">
    <h1 class="text-2xl font-semibold mb-4">Program Kerja</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Daftar Program -->
        <div class="bg-white rounded-2xl p-4 shadow">
            <h2 class="text-lg font-semibold mb-3">Daftar Proker</h2>
            <div class="space-y-3">
                @foreach($programs as $program)
                    <div 
                        class="p-3 rounded-xl cursor-pointer 
                        {{ $loop->first ? 'bg-teal-200' : 'bg-lime-100' }}">
                        <h3 class="font-medium">{{ $program->nama }}</h3>
                        <p class="text-sm text-gray-500">{{ $program->tanggal_mulai->format('j M') }} - {{ $program->tanggal_selesai->format('j M Y') }}</p>
                        <span class="text-xs px-2 py-1 rounded-full mt-2 inline-block
                            @if($program->status == 'Berlangsung') bg-emerald-500 text-white 
                            @elseif($program->status == 'Belum') bg-gray-400 text-white
                            @else bg-lime-600 text-white @endif">
                            {{ $program->status }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Detail Program -->
        <div class="md:col-span-2 bg-white rounded-2xl p-6 shadow">
            @php $selected = $programs->first(); @endphp
            @if($selected)
            <h2 class="text-xl font-semibold">{{ $selected->nama }}</h2>
            <p class="text-sm text-gray-500">{{ $selected->tanggal_mulai->format('j M') }} - {{ $selected->tanggal_selesai->format('j M Y') }}</p>

            <span class="text-xs px-2 py-1 rounded-full bg-emerald-500 text-white mt-2 inline-block">
                {{ $selected->status }}
            </span>

            <p class="mt-4 text-gray-700">
                {{ $selected->deskripsi }}
            </p>

            <p class="mt-4 text-sm text-gray-500">
                Penanggung Jawab: <strong>{{ $selected->penanggung_jawab }}</strong>
            </p>

            <div class="mt-6">
                <p class="text-sm font-semibold">Progress</p>
                <div class="w-full bg-lime-100 rounded-full h-2 mt-2">
                    <div class="bg-teal-400 h-2 rounded-full" style="width: {{ $selected->progress }}%"></div>
                </div>
                <p class="text-xs mt-1">{{ $selected->progress }}%</p>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
