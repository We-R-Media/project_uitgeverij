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
            'paper_type' => fake()->randomElement(['A5','A4','A3']),
            'size' => fake()->randomElement(['1/1 pagina', '1/2 pagina', '1/3 pagina', '1/4 pagina']),
            'measurement' => fake()->word(),
            'ratio' => fake()->randomFloat(2, 10, 100),
            'price' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
