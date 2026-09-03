<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            'appointment1.jpg',
            'appointment2.jpg',
            'appointment3.jpg',
            'appointment4.jpg',
            'appointment5.jpg',
            'appointment6.jpg',
            'appointment7.jpg',
            'appointment8.jpg',
            'appointment9.jpg',
            'appointment10.jpg',
        ];
        
        $image = fake()->randomElement($images);
        $source = database_path('seeders/imagesAppointments/'.$image);
        $filename = uniqid().'_'.$image;
        Storage::disk('public')->put('appointment/'.$filename, file_get_contents($source));

        return [
            'firstname' => fake('fr_FR')->firstName(),
            'lastname' => fake('fr_FR')->lastName(),
            'phone' => fake('fr_FR')->phoneNumber(),
            'address' => fake('fr_FR')->address(),
            'message' => fake()->paragraphs(fake()->numberBetween(1, 2), true),
            'statut' => fake()->randomElement(['lu', 'non lu']),
            'photo' => 'appointment/'.$filename,
        ];
    }
}
