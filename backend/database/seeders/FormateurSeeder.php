<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Formateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'a.chaoub@formateur.youcode.ma'],
            [
                'fullname' => 'Achraf Chaoub',
                'username' => 'achraf.chaoub',
                'link_profile' => 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg',
                'password' => Hash::make('123456'),
                'role' => 'formateur',
                'ville' => 'Safi',
                'campus' => 'Safi',
                'status' => 'active',
                'etat' => 'verified',
            ]
        );

        Formateur::updateOrCreate([
            'user_id' => $user->id
        ]);

        User::factory(5)->create([
            'role' => 'formateur'
        ])->each(function ($user) {
            Formateur::create([
                'user_id' => $user->id
            ]);
        });
    }
}