<?php

namespace Database\Factories;

use App\Models\Testimonie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<Testimonie>
 */
class TestimonieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            'testimonie1.jpg',
            'testimonie2.jpg',
            'testimonie3.jpeg',
            'testimonie4.jpg',
            'testimonie5.jpg',
            'testimonie6.jpg',
            'testimonie7.jpg',
            'testimonie8.jpg',
            'testimonie9.jpg',
            'testimonie10.jpg',
        ];
        
        $image = fake()->unique()->randomElement($images);
        $source = database_path('seeders/imagesTestimonies/'.$image);
        $filename = uniqid().'_'.$image;
        Storage::disk('public')->put('testimonie/'.$filename, file_get_contents($source));

        return [
            'firstname' => fake('fr_FR')->firstName(),
            'lastname' => fake('fr_FR')->lastName(),
            'phone' => fake('fr_FR')->phoneNumber(),
            'star' => fake()->randomElement(['1', '2', '3', '4', '5']),
            'statut' => fake()->randomElement(['lu', 'non lu']),
            'publish' => fake()->randomElement(['publier', 'non publier']),
            'opinion' => fake()->paragraphs(fake()->numberBetween(1, 3), true),
            'photo' => 'testimonie/'.$filename,
        ];
    }
}
