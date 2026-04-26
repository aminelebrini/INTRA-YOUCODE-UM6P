<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'amine.lebrini@admin.youcode.ma'],
            [
                'fullname' => 'AMINE LEBRINI',
                'username' => 'amine.lebrini',
                'link_profile' => 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg',
                'password' => Hash::make('Admin@123'),
                'role' => 'admin',
                'ville' => 'Khouribga',
                'campus' => 'safi',
                'status' => 'active',
                'etat' => 'en_attente',
            ]
        );

        $this->call(FormateurSeeder::class);
        $this->call(EtudiantSeeder::class);
    }
}
