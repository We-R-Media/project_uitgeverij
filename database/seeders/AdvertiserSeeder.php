<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Invoice;
use App\Models\Contact;

use Illuminate\Database\Seeder;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $randomNumberSmall = fake()->numberBetween(2, 5);
        $randomNumberLarge = fake()->numberBetween(8, 12);

        $advertisers = Advertiser::factory()
            ->count($randomNumberSmall)
            ->create();

        $advertisers->each(function ($advertiser) use ($randomNumberSmall) {
            $advertiser->invoices()->saveMany(
                Invoice::factory()->count(1)->make()
            );
        });

        $advertisers->each(function ($advertiser) use ($randomNumberLarge) {
            $advertiser->contacts()->saveMany(
                Contact::factory()->count($randomNumberLarge)->make()
            );
        });
    }
}
