<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salutation' => strtoupper(fake()->randomLetter() . fake()->randomLetter()),
            'initial' => strtoupper(fake()->randomLetter() . fake()->randomLetter()),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'preposition' => fake()->optional()->firstName(),
            'phone' => fake()->phoneNumber(),
            'role' => fake()->numberBetween(0, 1),
            'email' => fake()->email(),
            // 'deactivated_at' => fake()->optional()->dateTimeThisCentury(),
        ];
    }
}
