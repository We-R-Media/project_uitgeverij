<?php

namespace Database\Factories;

use App\AppHelpers\PostalCodeHelper;
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
        $formattedPostalCode = PostalCodeHelper::generatePostalCode();

        return [
            'name' => fake()->company(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'initial' => strtoupper(fake()->randomLetter() . fake()->randomLetter()),
            'email' => fake()->email(),
            'phone_mobile' => fake()->optional()->phoneNumber(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'postal_code' => $formattedPostalCode,
            'city' => fake()->city(),
            'po_box' => fake()->optional()->address(),
            'credit_limit' => fake()->randomFloat(2, 100, 3000),
            'comments' => fake()->optional()->paragraph(),
            'deactivated_at' => fake()->optional(.2)->dateTimeThisCentury(),
            'blacklisted_at' => fake()->optional(.2)->dateTimeThisCentury()
        ];
    }
}
