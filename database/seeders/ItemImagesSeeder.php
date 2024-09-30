<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller\ItemImage;

class ItemImagesSeeder extends Seeder
{
    public function run()
    {
        $imageNames = '1727587656_66f8e5481adc9_makeup.jfif';
        $itemIds = [1, 2, 3, 4, 5];

        foreach ($itemIds as $itemId) {
            ItemImage::create([
                'item_id' => $itemId,
                'image_name' => $imageNames,
            ]);
        }
    }
}
