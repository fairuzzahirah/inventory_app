<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::truncate();

        $categories = [
            ['name' => 'Laptop'],
            ['name' => 'Printer'],
            ['name' => 'AC'],
            ['name' => 'Proyektor'],
            ['name' => 'Jaringan'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
