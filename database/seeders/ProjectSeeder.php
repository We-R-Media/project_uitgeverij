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
        $randomNumberSmall = fake()->numberBetween(1, 4);
        $randomNumberLarge = fake()->numberBetween(6, 12);

        $projects = Project::factory()
            ->has( Order::factory()
                ->has( OrderLine::factory()->count( $randomNumberLarge ) )
                ->has( Advertiser::factory()
                    ->has(Invoice::factory()->count( $randomNumberLarge )
                )->count( $randomNumberSmall ) )
            )->count( $randomNumberSmall )
            ->has( Format::factory()->count( $randomNumberSmall ) )
            ->has( Client::factory() )
            ->has( Printer::factory() )
            ->has( Distributor::factory() )
            ->has( Designer::factory() )
            ->has( Layout::factory() )
            ->has( Format::factory() )
            ->has( Tax::factory() )
            ->count($randomNumberSmall);

        $projects->create();
    }
}
