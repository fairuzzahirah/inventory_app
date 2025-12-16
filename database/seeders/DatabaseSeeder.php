<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            UnitSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ItemSeeder::class,
            MaintenanceRequestSeeder::class,
            MaintenanceRequestUserSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}