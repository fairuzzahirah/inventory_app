<?php

namespace Database\Seeders;

use App\Models\MaintenanceRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class MaintenanceRequestSeeder extends Seeder
{
    public function run(): void
    {
        MaintenanceRequest::truncate();

        $pelapor = User::where('role', 'pelapor')->first();
        $items = Item::all();

        foreach ($items->take(5) as $item) {
            MaintenanceRequest::create([
                'item_id' => $item->id,
                'requested_by' => $pelapor->id,
                'unit_id' => $item->unit_id,
                'priority' => 'medium',
                'status' => 'open',
                'description' => 'Barang bermasalah',
            ]);
        }
    }
}

