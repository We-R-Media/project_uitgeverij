<?php

namespace Database\Factories;

use App\AppHelpers\PostalCodeHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'address' => fake()->address(),
            'postal_code' => $formattedPostalCode,
            'city' => fake()->city(),
        ];
    }
}
