<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'initial' => strtoupper(fake()->randomLetter() . fake()->randomLetter()),
            'first_name' => fake()->firstName(),
            'preposition' => fake()->optional()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'deactivated_at' => fake()->optional()->dateTimeThisCentury(),
        ];
    }
}
