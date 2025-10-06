<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        Program::insert([
            [
                'nama' => 'Pemrogramman Laravel',
                'deskripsi' => 'Mengenal lebih dalam tentang pemrogramman Laravel.',
                'penanggung_jawab' => 'Lala (Ketua)',
                'tanggal_mulai' => '2025-09-02',
                'tanggal_selesai' => '2025-09-14',
                'status' => 'Berlangsung',
                'progress' => 75,
            ],
            [
                'nama' => 'Design UI/UX',
                'deskripsi' => 'Workshop dan praktik desain antarmuka pengguna modern.',
                'penanggung_jawab' => 'Yuda',
                'tanggal_mulai' => '2025-08-29',
                'tanggal_selesai' => '2025-09-07',
                'status' => 'Berlangsung',
                'progress' => 60,
            ],
            [
                'nama' => 'Rapat Event 2025',
                'deskripsi' => 'Persiapan untuk kegiatan tahunan kampus.',
                'penanggung_jawab' => 'Rani',
                'tanggal_mulai' => '2025-10-11',
                'tanggal_selesai' => '2025-10-13',
                'status' => 'Belum',
                'progress' => 0,
            ],
            [
                'nama' => 'Seminar ITech 2025',
                'deskripsi' => 'Seminar teknologi tahunan dengan pembicara nasional.',
                'penanggung_jawab' => 'Dimas',
                'tanggal_mulai' => '2025-08-04',
                'tanggal_selesai' => '2025-08-05',
                'status' => 'Selesai',
                'progress' => 100,
            ],
        ]);
    }
}
