<?php

namespace Database\Seeders;

use App\Models\MaintenanceRequest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceRequestUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('maintenance_request_user')->truncate();

        $requests = MaintenanceRequest::all();
        $teknisi = User::where('role', 'teknisi')->get();

        foreach ($requests as $request) {
            DB::table('maintenance_request_user')->insert([
                [
                    'maintenance_request_id' => $request->id,
                    'user_id' => $teknisi->random()->id,
                    'role' => 'leader',
                ],
                [
                    'maintenance_request_id' => $request->id,
                    'user_id' => $teknisi->random()->id,
                    'role' => 'helper',
                ],
            ]);
        }
    }
}

