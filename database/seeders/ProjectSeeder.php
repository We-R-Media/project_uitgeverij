<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Project::factory()
            ->has( Format::factory()->count(3) )
            ->count(4)
            ->create();
    }
}
