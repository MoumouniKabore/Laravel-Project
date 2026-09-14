<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'firstname' => 'Kabore',
            'lastname' => 'Moumin',
            'rule' => 'admin',
            'email' => 'moumin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        
        User::factory(1)->unverified()->create();
    }
}
