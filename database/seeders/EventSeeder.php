<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'nama' => 'Seminar Desain UI/UX',
                'deskripsi' => 'Acara seminar dan pelatihan mengenai praktik terbaik desain antarmuka dan pengalaman pengguna.',
                'lokasi' => 'Aula Utama Kampus',
                'gambar' => 'https://picsum.photos/400/200?random=11',
                'tanggal_mulai' => '2025-10-10',
                'tanggal_selesai' => '2025-10-11',
                'status' => 'Mendatang',
            ],
            [
                'nama' => 'Workshop Laravel Advance',
                'deskripsi' => 'Pelatihan intensif Laravel dengan topik Eloquent, Filament, dan API.',
                'lokasi' => 'Gedung IT Center',
                'gambar' => 'https://picsum.photos/400/200?random=12',
                'tanggal_mulai' => '2025-09-28',
                'tanggal_selesai' => '2025-09-29',
                'status' => 'Berlangsung',
            ],
            [
                'nama' => 'Tech Expo 2025',
                'deskripsi' => 'Pameran teknologi terbaru dari startup lokal dan mahasiswa.',
                'lokasi' => 'Convention Hall Surabaya',
                'gambar' => 'https://picsum.photos/400/200?random=13',
                'tanggal_mulai' => '2025-08-20',
                'tanggal_selesai' => '2025-08-22',
                'status' => 'Selesai',
            ],
        ]);
    }
}
