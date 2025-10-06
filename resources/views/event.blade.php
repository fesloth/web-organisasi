@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-6" x-data="{ showModal: false, confirmDelete: false, deleteUrl: '' }">

        @include('partials.header')

        <div class="min-h-screen bg-[#F3F7E8] px-8 py-6">
            <h1 class="text-2xl font-semibold text-center mb-6">Event</h1>

            {{-- Tombol tambah event --}}
            <button @click="showModal = true"
                class="fixed bottom-8 right-8 w-12 h-12 bg-teal-500 text-white rounded-full shadow-lg hover:bg-teal-600 flex items-center justify-center text-xl cursor-pointer">
                <i class="fa-solid fa-plus"></i>
            </button>

            <!-- Tabs Status -->
            <div class="flex justify-center gap-3 mb-8">
                @foreach (['Semua', 'Mendatang', 'Berlangsung', 'Selesai'] as $status)
                    <a href="?status={{ strtolower($status) }}"
                        class="px-6 py-2 rounded-lg text-sm font-medium transition 
                {{ request('status') == strtolower($status) || (!request('status') && $loop->first) ? 'bg-red-400 text-white' : 'bg-white text-gray-700' }}">
                        {{ $status }}
                    </a>
                @endforeach
            </div>

            <!-- Grid Event -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition flex flex-col justify-between"
                        x-data="{ open: false }">

                        <div>
                            {{-- <img src="{{ $event->gambar ?? 'https://via.placeholder.com/400x200' }}"
                                alt="{{ $event->nama }}" class="w-full h-40 object-cover"> --}}
                            <img src="{{ $event->gambar ? asset('storage/' . $event->gambar) : 'https://via.placeholder.com/400x200' }}"
                                alt="{{ $event->nama }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg">{{ $event->nama }}</h3>
                                <p class="text-sm text-gray-500">
                                    {{ $event->tanggal_mulai->format('j M Y') }} -
                                    {{ $event->tanggal_selesai->format('j M Y') }}
                                </p>
                                <p class="text-xs text-gray-400 mt-1">Lokasi: {{ $event->lokasi }}</p>

                                <span
                                    class="text-xs px-2 py-1 mt-3 inline-block rounded-full
                                @if ($event->status == 'Berlangsung') bg-red-400 text-white
                                @elseif($event->status == 'Mendatang') bg-yellow-400 text-white
                                @else bg-green-500 text-white @endif">
                                    {{ $event->status }}
                                </span>

                                <!-- Deskripsi -->
                                <div x-show="open" x-transition
                                    class="mt-3 text-gray-700 text-sm bg-gray-50 rounded-lg p-3 border border-gray-200">
                                    <p>{{ $event->deskripsi }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian bawah: tombol rincian + hapus -->
                        <div class="flex justify-between items-center px-4 pb-4">
                            <!-- Tombol toggle rincian -->
                            <button @click="open = !open"
                                class="text-sm text-teal-600 hover:underline focus:outline-none cursor-pointer flex items-center gap-1">
                                <i class="fa-solid fa-circle-info"></i>
                                <span x-text="open ? 'Sembunyikan Rincian' : 'Lihat Rincian'"></span>
                            </button>

                            <!-- Tombol hapus kanan bawah -->
                            <button @click="deleteUrl='{{ route('events.destroy', $event->id) }}'; confirmDelete=true"
                                class="text-red-500 hover:text-red-700 cursor-pointer">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Load More -->
            <div class="flex justify-center mt-8">
                <button class="px-4 py-2 bg-white text-gray-700 rounded-full border hover:bg-gray-100 cursor-pointer">
                    Load more
                </button>
            </div>
        </div>

        <!-- Modal Tambah Event -->
        <div x-show="showModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-transition>
            <div @click.away="showModal = false" class="bg-white w-full max-w-lg rounded-2xl shadow-lg p-6 relative">

                <!-- Tombol Close -->
                <button @click="showModal = false"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 cursor-pointer">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>

                <h2 class="text-xl font-semibold mb-4">Tambah Event Baru</h2>

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-sm font-medium text-gray-700">Nama Event</label>
                        <input type="text" name="nama"
                            class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none"
                            placeholder="Masukkan nama event..." required>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none"
                            placeholder="Tuliskan deskripsi event..."></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai"
                                class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none"
                                required>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai"
                                class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none"
                                required>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" name="lokasi"
                            class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none"
                            placeholder="Contoh: Aula Kampus">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Gambar (opsional)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full mt-1 text-sm text-gray-600">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Status</label>
                        <select name="status"
                            class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-teal-400 outline-none">
                            <option value="Mendatang">Mendatang</option>
                            <option value="Berlangsung">Berlangsung</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="button" @click="showModal = false"
                            class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg mr-2 cursor-pointer">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 cursor-pointer">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div x-show="confirmDelete" x-cloak x-transition
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-sm shadow-lg">
                <h2 class="text-lg font-semibold mb-3">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-6">Apakah kamu yakin ingin menghapus event ini?</p>

                <div class="flex justify-end gap-3">
                    <button @click="confirmDelete=false"
                        class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 cursor-pointer">Batal</button>
                    <form :action="deleteUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 cursor-pointer">Hapus</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
