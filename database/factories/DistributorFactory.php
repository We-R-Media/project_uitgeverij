<?php

namespace Database\Factories;

use App\AppHelpers\Helpers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distribution>
 */
class DistributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $formattedPostalCode = Helpers::generatePostalCode();

        return [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'postal_code' => $formattedPostalCode,
            'city' => fake()->city(),
        ];
    }
}
