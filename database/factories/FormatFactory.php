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
            'format_name' => fake()->unique()->word(),
            'size' => fake()->word(),
            'measurement' => fake()->word(),
            'price' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
