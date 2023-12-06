<?php

namespace Database\Factories;

use App\Models\Format;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'designer' => fake()->word(),
            'printer' => fake()->word(),
            'client' => fake()->word(),
            'distribution' => fake()->word(),
            'release_name' => fake()->word(),
            'edition_name' => fake()->word(),
            'print_edition' => fake()->word(),
            'paper_format' => fake()->randomElement(['A5','A4','A3']),
            'pages_redaction' => fake()->numberBetween(1, 100),
            'pages_adverts' => fake()->numberBetween(1, 100),
            'pages_total' => fake()->optional()->numberBetween(1, 100),
            'paper_type_cover' => fake()->word(),
            'paper_type_interior' => fake()->word(),
            'color_cover' => fake()->word(),
            'color_interior' => fake()->word(),
            'ledger' => fake()->numberBetween(1, 10),
            'journal' => fake()->numberBetween(1, 10),
            'department' => fake()->numberBetween(1, 10),
            'year' => fake()->dateTimeBetween('-2 years', 'now'),
            'revenue_goals' => fake()->randomFloat(2, 1000, 10000),
            'comments' => fake()->optional()->paragraph(),
        ];
    }
}
