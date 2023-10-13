<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderLine>
 */
class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'base_price' => fake()->numberBetween(0, 500),
            'discount' => fake()->numberBetween(0, 100),
            'invoiced_at' => fake()->optional()->dateTimeThisCentury(),
        ];
    }
}
