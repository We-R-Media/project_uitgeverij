<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderLine;

class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $basePrice = $this->faker->numberBetween(0, 500);
        $discount = $this->faker->numberBetween(0, 100);

        return [
            'base_price' => $basePrice,
            'discount' => $discount,
            'price_with_discount' => $basePrice - (($discount / 100) * $basePrice),
            'invoiced_at' => $this->faker->optional()->dateTimeThisCentury(),
        ];
    }
}
