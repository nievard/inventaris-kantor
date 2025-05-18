<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::insert([
            [
                'name' => 'Laptop Lenovo',
                'category_id' => 1, 
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pulpen Biru',
                'category_id' => 2, 
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
