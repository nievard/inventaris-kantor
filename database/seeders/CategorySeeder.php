<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alat Tulis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Furnitur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
