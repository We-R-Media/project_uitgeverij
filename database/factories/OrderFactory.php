<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_date' => fake()->dateTimeThisCentury(),
            'order_total_price' => fake()->randomFloat(2, 10, 500),
            'approved_at' => fake()->dateTime(),
            'comment_confirmation' => fake()->optional()->paragraph(),
            'comment_facturation' => fake()->optional()->paragraph(),
            'comment_reference' => fake()->optional()->paragraph(),
        ];
    }
}
