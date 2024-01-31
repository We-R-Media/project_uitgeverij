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
            'publisher_id' => Publisher::factory(),
            'layout_id' => Layout::factory(),
            'tax_id' => Tax::factory(),
            'user_id' => User::factory(),
            'name' => fake()->randomElement([
                '2024RCT-01',
                '2024RCT-02',
                '2024RCT-03',
                '2024RCT-04',
                '2024RCT-05',
                '2024RCT-06',
              ]),
            'designer' => fake()->word('VDS Crossmedia! BV'),
            'printer' => fake()->word('Veldhuis'),
            'client' => fake()->word('ConceptPlus'),
            'distribution' => fake()->word('PostNL'),
            'release_name' => fake()->word('Recreatief Totaal'),
            'edition_name' => fake()->randomElement([
              'nr. 1 2024',
              'nr. 2 2024',
              'nr. 3 2024',
              'nr. 4 2024',
              'nr. 5 2024',
              'nr. 6 2024',
            ]),
            'print_edition' => fake()->word(),
            'paper_format' => fake()->randomElement(['A5','A4','A3', 'Standaard' ]),
            'pages_redaction' => fake()->numberBetween(1, 100),
            'pages_adverts' => fake()->numberBetween(1, 100),
            'pages_total' => fake()->optional()->numberBetween(1, 100),
            'paper_type_cover' => fake()->word('90 grams gesatineerd mc'),
            'paper_type_interior' => fake()->word('90 grams gesatineerd mc'),
            'color_cover' => fake()->word('Full colour'),
            'color_interior' => fake()->word('Full colour'),
            'ledger' => fake()->numberBetween(1, 10),
            'journal' => fake()->numberBetween(1, 10),
            'cost_place' => fake()->numberBetween(1, 10),
            'year' => fake()->dateTimeBetween('-2 years', 'now'),
            'revenue_goals' => fake()->randomFloat(2, 1000, 10000),
            'comments' => fake()->optional()->paragraph(),
        ];
    }
}
