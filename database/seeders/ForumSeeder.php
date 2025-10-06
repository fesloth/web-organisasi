<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('forums')->insert([
            [
                'judul' => 'Bagaimana cara optimasi performa Laravel?',
                'isi' => 'Aku mau tanya, gimana cara optimasi query di Laravel biar nggak berat banget pas load data besar?',
                'penulis' => 'Lala',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Framework terbaik untuk UI cepat?',
                'isi' => 'Menurut kalian, mending pakai Tailwind atau Bootstrap buat project baru?',
                'penulis' => 'Yuda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
