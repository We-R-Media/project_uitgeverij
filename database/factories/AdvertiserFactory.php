<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertiser>
 */
class AdvertiserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone_mobile' => fake()->optional()->phoneNumber(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'po_box' => fake()->optional()->address(),
            'comments' => fake()->optional()->paragraph(),
            'deactivated_at' => fake()->optional()->dateTimeThisCentury(),
            'blacklisted_at' => fake()->optional()->dateTimeThisCentury()
        ];
    }
}
