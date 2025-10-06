<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cegah duplikat email user
        User::updateOrCreate(
            ['email' => 'test@example.com'], // cari berdasarkan email
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            ProgramSeeder::class,
            EventSeeder::class,
            ForumSeeder::class,
        ]);
    }
}
