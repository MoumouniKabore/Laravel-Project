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
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'object' => fake()->sentence(),
            'message' => fake()->paragraphs(fake()->numberBetween(1, 2), true),
            'statut' => fake()->randomElement(['lu', 'non lu']),
        ];
    }
}
