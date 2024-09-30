<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller\PostImage;

class PostImagesSeeder extends Seeder
{
    public function run()
    {
        $imageNames = '1727624694_66f975f6f2875_post.jfif';
        $postIds = [1, 2, 3, 4, 5];

        foreach ($postIds as $postId) {
            PostImage::create([
                'post_id' => $postId,
                'image_name' => $imageNames,
            ]);
        }
    }
}
