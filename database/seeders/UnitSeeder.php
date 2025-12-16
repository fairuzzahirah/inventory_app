<?php

namespace Database\Seeders;
use App\Models\Unit;
use Illuminate\Database\Seeder; // ⬅️ INI WAJIB


class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'name' => 'IT Support',
                'description' => 'Unit IT'
            ],
            [
                'name' => 'Finance',
                'description' => 'Keuangan'
            ],
            [
                'name' => 'HRD',
                'description' => 'Sumber Daya Manusia'
            ],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
