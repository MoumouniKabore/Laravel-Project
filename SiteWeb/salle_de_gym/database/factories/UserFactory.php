<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            'user1.jpg',
            'user2.jpg',
        ];
        
        $image = fake()->unique()->randomElement($images);
        $source = database_path('seeders/imagesUsers/'.$image);
        $filename = uniqid().'_'.$image;
        Storage::disk('public')->put('user/'.$filename, file_get_contents($source));

        return [
            'photo' => 'user/'.$filename,
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'rule' => fake()->randomElement(['admin', 'manager']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
