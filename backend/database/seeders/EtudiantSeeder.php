<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EtudiantSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'a.quabli@etudiant.youcode.ma'],
            [
                'fullname' => 'Abdelhadi quabli',
                'username' => 'abdelhadiqabli',
                'link_profile' => 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg',
                'password' => Hash::make('123456'),
                'role' => 'etudiant',
                'ville' => 'Safi',
                'campus' => 'Safi',
                'status' => 'active',
                'etat' => 'verified',
            ]
        );

        Student::updateOrCreate([
            'user_id' => $user->id
        ]);

        User::factory(5)->create([
            'role' => 'etudiant'
        ])->each(function ($user) {
            Student::create([
                'user_id' => $user->id
            ]);
        });
    }
}