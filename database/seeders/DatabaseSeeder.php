<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AdvertiserSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
