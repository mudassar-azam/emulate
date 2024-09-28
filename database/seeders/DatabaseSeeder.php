<?php

namespace Database\Seeders;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(SellerSettingsSeeder::class);
        $this->call(ItemsSeeder::class);
        $this->call(BuyerSettingsSeeder::class);
    }
}
