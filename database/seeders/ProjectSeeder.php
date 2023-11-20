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
        $randomNumberSmall = fake()->numberBetween(5, 9);
        $randomNumberLarge = fake()->numberBetween(12, 26);
     
         $advertisers = Advertiser::factory()
             ->has(Invoice::factory()->count($randomNumberLarge))
             ->has(Contact::factory()->count($randomNumberLarge))
             ->count($randomNumberSmall)
             ->create();
     
         $tax = Tax::factory()->times($randomNumberSmall)->create();
         $layout = Layout::factory()->times($randomNumberSmall)->create();
     
         $projects = Project::factory()
             ->has(Order::factory()
                 ->has(OrderLine::factory()->count($randomNumberLarge))
                 ->afterCreating(function (Order $order) use ($advertisers) {
                     $advertiser = $advertisers->random();
                     $order->advertiser()->associate($advertiser)->save();
                 })
             )
             ->has(Format::factory()->count($randomNumberSmall))
             ->has(Client::factory())
             ->has(Printer::factory())
             ->has(Distributor::factory())
             ->has(Designer::factory())
             ->count($randomNumberSmall)
             ->create();
     
         // Set the tax_id and layout_id directly for each project
         foreach ($projects as $key => $project) {
             $project->tax_id = $tax[$key]->id; // Access individual tax instance
             $project->layout_id = $layout[$key]->id; // Access individual layout instance
             $project->save();
         }
     }
}
