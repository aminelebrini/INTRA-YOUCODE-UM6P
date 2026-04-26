<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->username() . '@student.youcode.ma',
            'password' => Hash::make('123456'),
            'role' => 'formateur',
            'ville' => fake()->city(),
            'campus' => 'Nador',
            'status' => 'active',
            'etat' => 'verified',
            'link_profile' => 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg',
        ];
    }
}
