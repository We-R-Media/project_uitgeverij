<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tax;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomNumberSmall = fake()->numberBetween(2, 5);

        $tax = Tax::factory()->times($randomNumberSmall)->create();
    }
}
