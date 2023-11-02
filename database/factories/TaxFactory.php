<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tax>
 */
class TaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => fake()->country(),
            'zero' => fake()->numberBetween(1, 10),
            'low' => fake()->numberBetween(1, 10),
            'high' => fake()->numberBetween(1, 10),
        ];
    }
}
