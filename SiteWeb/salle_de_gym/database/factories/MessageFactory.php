<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake('fr_FR')->firstName(),
            'lastname' => fake('fr_FR')->lastName(),
            'phone' => fake('fr_FR')->phoneNumber(),
            'email' => fake('fr_FR')->email(),
            'object' => fake()->sentence(),
            'message' => fake()->paragraphs(fake()->numberBetween(1, 2), true),
            'statut' => fake()->randomElement(['lu', 'non lu']),
        ];
    }
}
