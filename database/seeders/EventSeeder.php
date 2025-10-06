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
                'nama' => 'Naras Event',
                'deskripsi' => 'Pelatihan dan seminar seputar teknologi web.',
                'lokasi' => 'Aula Kampus',
                'gambar' => 'https://picsum.photos/400/200?random=1',
                'tanggal_mulai' => '2025-10-05',
                'tanggal_selesai' => '2025-10-07',
                'status' => 'Berlangsung',
                'progress' => 50,
            ],
            [
                'nama' => 'Hackathon 2025',
                'deskripsi' => 'Kompetisi coding 48 jam tingkat nasional.',
                'lokasi' => 'Jakarta',
                'gambar' => 'https://picsum.photos/400/200?random=2',
                'tanggal_mulai' => '2025-10-15',
                'tanggal_selesai' => '2025-10-17',
                'status' => 'Mendatang',
                'progress' => 0,
            ],
            [
                'nama' => 'Tech Expo',
                'deskripsi' => 'Pameran teknologi terbaru dan inovasi startup.',
                'lokasi' => 'Surabaya',
                'gambar' => 'https://picsum.photos/400/200?random=3',
                'tanggal_mulai' => '2025-08-20',
                'tanggal_selesai' => '2025-08-21',
                'status' => 'Selesai',
                'progress' => 100,
            ],
        ]);
    }
}
