<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_date' => fake()->dateTimeThisCentury(),
            'post_method' => fake()->randomElement(['mail', 'post']),
            'first_reminder' => fake()->optional()->dateTimeThisCentury(),
            'second_reminder' => fake()->optional()->dateTimeThisCentury(),
            'third_reminder' => fake()->optional()->dateTimeThisCentury(),
            'payed_at' => fake()->optional()->dateTimeThisCentury(),
        ];
    }
}
