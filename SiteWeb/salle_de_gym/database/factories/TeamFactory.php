<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            'team1.jpg',
            'team2.jpg',
            'team3.jpg',
            'team4.jpg',
            'team5.jpg',
            'team6.jpg',
        ];
        
        $image = fake()->randomElement($images);
        $source = database_path('seeders/imagesTeams/'.$image);
        $filename = uniqid().'_'.$image;
        Storage::disk('public')->put('team/'.$filename, file_get_contents($source));

        return [
            'fullname' => fake('fr_FR')->name(),
            'fonction' => fake()->randomElement(['coach principal', 'coach sportif', 'instructeur fitness', 'éducateur sportif', 'moniteur plateau']),
            'phone' => fake('fr_FR')->phoneNumber(),
            'address' => fake('fr_FR')->address(),
            'email' => fake('fr_FR')->unique()->safeEmail(),
            'photo' => 'team/'.$filename,
        ];
    }
}
