<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Item 1',
                'image' => 'image1.jpg',
                'price' => 29.99,
                'size' => 'M',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item 2',
                'image' => 'image2.jpg',
                'price' => 49.99,
                'size' => 'L',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item 3',
                'image' => 'image3.jpg',
                'price' => 19.99,
                'size' => 'S',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
