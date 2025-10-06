@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6" 
     x-data="{ selectedProgram: {{ $programs->first()?->id ?? 'null' }}, showAddModal: false }">
    @include('partials.header')

    <div class="min-h-screen bg-[#F3F7E8] px-8 py-6 relative">
        <!-- Judul dan tombol tambah -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Program Kerja</h1>
            <button @click="showAddModal = true"
                class="flex items-center justify-center w-9 h-9 bg-teal-500 text-white rounded-full hover:bg-teal-600 shadow cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Daftar Program -->
            <div class="bg-white rounded-2xl p-4 shadow relative">
                <h2 class="text-lg font-semibold mb-3">Daftar Proker</h2>

                <!-- Scrollable list -->
                <div class="space-y-3 max-h-[400px] overflow-y-auto pr-1 scrollbar-thin scrollbar-thumb-lime-400 scrollbar-track-lime-100">
                    @foreach ($programs as $program)
                        <div 
                            @click="selectedProgram = {{ $program->id }}" 
                            class="p-3 rounded-xl cursor-pointer transition-all duration-200"
                            :class="selectedProgram === {{ $program->id }} 
                                ? 'bg-teal-200 shadow-md' 
                                : 'bg-lime-100 hover:bg-lime-200'">
                            <h3 class="font-medium">{{ $program->nama }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ $program->tanggal_mulai->format('j M') }} - {{ $program->tanggal_selesai->format('j M Y') }}
                            </p>
                            <span class="text-xs px-2 py-1 rounded-full mt-2 inline-block
                                @if ($program->status == 'Berlangsung') bg-emerald-500 text-white 
                                @elseif($program->status == 'Belum') bg-gray-400 text-white
                                @else bg-lime-600 text-white @endif">
                                {{ $program->status }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Detail Program -->
            <div class="md:col-span-2 bg-white rounded-2xl p-6 shadow relative overflow-hidden">
                @foreach ($programs as $program)
                    <div 
                        x-show="selectedProgram === {{ $program->id }}"
                        x-transition
                        class="absolute inset-0 p-6 bg-white rounded-2xl"
                    >
                        <h2 class="text-xl font-semibold">{{ $program->nama }}</h2>
                        <p class="text-sm text-gray-500">
                            {{ $program->tanggal_mulai->format('j M') }} - {{ $program->tanggal_selesai->format('j M Y') }}
                        </p>

                        <span class="text-xs px-2 py-1 rounded-full bg-emerald-500 text-white mt-2 inline-block">
                            {{ $program->status }}
                        </span>

                        <p class="mt-4 text-gray-700">
                            {{ $program->deskripsi }}
                        </p>

                        <p class="mt-4 text-sm text-gray-500">
                            Penanggung Jawab: <strong>{{ $program->penanggung_jawab }}</strong>
                        </p>

                        <div class="mt-6">
                            <p class="text-sm font-semibold">Progress</p>
                            <div class="w-full bg-lime-100 rounded-full h-2 mt-2">
                                <div class="bg-teal-400 h-2 rounded-full" style="width: {{ $program->progress }}%"></div>
                            </div>
                            <p class="text-xs mt-1">{{ $program->progress }}%</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal Tambah Program -->
    <div x-show="showAddModal" 
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
         x-transition>
        <div @click.away="showAddModal = false"
             class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 relative">
            <h2 class="text-xl font-semibold mb-4">Tambah Program Kerja</h2>

            <form action="{{ route('program.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Nama Program</label>
                    <input type="text" name="nama" class="w-full border rounded-lg p-2 mt-1 focus:ring focus:ring-lime-300" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="w-full border rounded-lg p-2 mt-1" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="w-full border rounded-lg p-2 mt-1" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Penanggung Jawab</label>
                    <input type="text" name="penanggung_jawab" class="w-full border rounded-lg p-2 mt-1">
                </div>

                <div>
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full border rounded-lg p-2 mt-1"></textarea>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button" @click="showAddModal = false"
                        class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 mr-2 cursor-pointer">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-teal-500 text-white hover:bg-teal-600 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
