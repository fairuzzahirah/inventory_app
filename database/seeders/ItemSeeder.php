<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::truncate();

        $categories = Category::pluck('id');
        $units = Unit::pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            Item::create([
                'name' => "Asset $i",
                'code' => "AST-00$i",
                'category_id' => $categories->random(),
                'unit_id' => $units->random(),
                'status' => 'aktif',
                'description' => 'Barang operasional',
            ]);
        }
    }
}
