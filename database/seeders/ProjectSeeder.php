<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Client;
use App\Models\Designer;
use App\Models\Distributor;
use App\Models\Format;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Contact;
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
        $randomNumberSmall = fake()->numberBetween(2, 5);
        $randomAdvertiser = Advertiser::all();

         $projects = Project::factory()
             ->has(Order::factory()
                ->has(OrderLine::factory()->count(2))
                ->afterCreating(function (Order $order) {
                    $advertiser = Advertiser::inRandomOrder()->first();
                    $order->advertiser()->associate($advertiser)->save();
                })
             )
             ->count($randomNumberSmall)
             ->create();

     }
}
