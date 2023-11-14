<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Client;
use App\Models\Designer;
use App\Models\Distributor;
use App\Models\Format;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Printer;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tax;
use App\Models\Layout;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomNumberSmall = fake()->numberBetween(22, 78);
        $randomNumberLarge = fake()->numberBetween(78, 127);

        $advertisers = Advertiser::factory()
            ->has(Invoice::factory()->count($randomNumberLarge))
            ->count($randomNumberSmall)
            ->create();

        $projects = Project::factory()
            ->has(Order::factory()
                ->has(OrderLine::factory()->count($randomNumberLarge))
                ->afterCreating( function (Order $order) use ( $advertisers ) {
                    $advertiser = $advertisers->random();
                    $order->advertiser()->associate($advertiser)->save();
                })
            )
            ->has(Format::factory()->count($randomNumberSmall))
            ->has(Client::factory())
            ->has(Printer::factory())
            ->has(Distributor::factory())
            ->has(Designer::factory())
            ->has(Layout::factory())
            ->has(Tax::factory())
            ->count($randomNumberSmall)
            ->create();
    }
}
