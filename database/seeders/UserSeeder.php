<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();

        $units = Unit::pluck('id');

        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'unit_id' => null,
        ]);

        // Pelapor
        User::create([
            'name' => 'Pelapor 1',
            'email' => 'pelapor@example.com',
            'password' => Hash::make('password123'),
            'role' => 'pelapor',
            'unit_id' => $units->random(),
        ]);

        // Teknisi (8 user)
        for ($i = 1; $i <= 8; $i++) {
            User::create([
                'name' => "Teknisi $i",
                'email' => "teknisi$i@example.com",
                'password' => Hash::make('password123'),
                'role' => 'teknisi',
                'unit_id' => $units->random(),
            ]);
        }
    }
}

