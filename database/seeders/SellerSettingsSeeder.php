<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('seller_settings')->insert([
            [
                'introduction' => 'Introduction for user 1',
                'facebook_link' => 'https://facebook.com/user1',
                'youtube_link' => 'https://youtube.com/user1',
                'instagram_link' => 'https://instagram.com/user1',
                'twitter_link' => 'https://twitter.com/user1',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'introduction' => 'Introduction for user 2',
                'facebook_link' => 'https://facebook.com/user2',
                'youtube_link' => 'https://youtube.com/user2',
                'instagram_link' => 'https://instagram.com/user2',
                'twitter_link' => 'https://twitter.com/user2',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'introduction' => 'Introduction for user 3',
                'facebook_link' => 'https://facebook.com/user3',
                'youtube_link' => 'https://youtube.com/user3',
                'instagram_link' => 'https://instagram.com/user3',
                'twitter_link' => 'https://twitter.com/user3',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
