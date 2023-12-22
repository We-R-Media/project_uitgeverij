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
            'country' => fake()->randomElement([
                'Nederland',
                'Duitsland'
            ]),
            'zero' => fake()->number(0),
            'low' => fake()->number(7),
            'high' => fake()->number(21),
        ];
    }
}
