<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Format>
 */
class FormatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'format_title' => fake()->randomElement([
                'Crossmediapakket 1',
                'Crossmediapakket 2',
                'Crossmediapakket 3',
                'Crossmediapakket 4',
                'Crossmediapakket 5',
                'Crossmediapakket 6',
            ]),
            'size' => fake()->randomElement([
                 '1/1 pagina',
                 '1/2 pagina', 
                 '1/3 pagina', 
                 '1/4 pagina',
                 '1/5 pagina',
                 '1/6 pagina',
            ]),
            'measurement' => fake()->word(),
            'ratio' => fake()->randomElement([
                '1.0',
                '0.75',
                '0.5',
                '0.33',
                '0.15',
                '0.10',
            ]),
            'price' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
