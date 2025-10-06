@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-6">
        @include('partials.header')

        <div class="min-h-screen bg-[#F3F7E8] px-8 py-6">
            <h1 class="text-2xl font-semibold mb-6 text-center">Forum Diskusi</h1>

            <div x-data="{ showForm: false }" class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-6 mb-10">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-medium">Buat Topik Baru</h2>

                    <!-- Tombol + -->
                    <button @click="showForm = !showForm"
                        class="bg-red-400 text-white px-2 py-2 rounded-full hover:bg-red-500 transition cursor-pointer" title="Tambah Topik">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>

                <!-- Pesan sukses -->
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form buat topik baru -->
                <form x-show="showForm" x-transition action="{{ route('forum.store') }}" method="POST"
                    class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Judul topik..."
                            class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-400 outline-none" />
                    </div>

                    <div>
                        <textarea name="isi" rows="4" placeholder="Tuliskan pertanyaan atau ide kamu..."
                            class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-400 outline-none">{{ old('isi') }}</textarea>
                    </div>

                    <button class="bg-red-400 text-white px-5 py-2 rounded-lg hover:bg-red-500 cursor-pointer">
                        Kirim
                    </button>
                </form>
            </div>

            {{-- Daftar Forum --}}
            <div class="max-w-2xl mx-auto space-y-6">
                @forelse($forums as $forum)
                    <div x-data="{ editMode: false, judul: '{{ $forum->judul }}', isi: '{{ $forum->isi }}' }" class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">
                        {{-- Mode tampil --}}
                        <template x-if="!editMode">
                            <div>
                                <h3 class="text-lg font-semibold" x-text="judul"></h3>
                                <p class="text-gray-700 mt-2" x-text="isi"></p>
                                <p class="text-xs text-gray-500 mt-3">
                                    Ditulis oleh <strong>{{ $forum->penulis }}</strong> •
                                    {{ $forum->created_at->diffForHumans() }}
                                </p>
                                @auth
                                    @if (Auth::user()->name === $forum->penulis)
                                        <div class="flex gap-2 mt-4">
                                            <!-- Tombol Edit -->
                                            <button @click="editMode = true"
                                                class="px-3 py-1 text-sm bg-yellow-400 text-white rounded hover:bg-yellow-500">
                                                Edit
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('forum.destroy', $forum->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus topik ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </template>

                        {{-- Mode edit --}}
                        <template x-if="editMode">
                            <form action="{{ route('forum.update', $forum->id) }}" method="POST" class="space-y-3 mt-2">
                                @csrf
                                @method('PUT')

                                <input type="text" name="judul" x-model="judul"
                                    class="w-full p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-400 outline-none" />

                                <textarea name="isi" rows="3" x-model="isi"
                                    class="w-full p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-400 outline-none"></textarea>

                                <input type="hidden" name="penulis" value="{{ Auth::user()->name }}">

                                <div class="flex gap-2">
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">
                                        Simpan
                                    </button>

                                    <button type="button" @click="editMode = false"
                                        class="bg-gray-400 text-white px-4 py-1 rounded hover:bg-gray-500">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </template>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada topik forum.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
