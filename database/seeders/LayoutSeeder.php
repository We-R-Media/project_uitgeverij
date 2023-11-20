<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layout;

class LayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomNumberSmall = fake()->numberBetween(2, 5);

        $layout = Layout::factory()->times($randomNumberSmall)->create();
    }
}
