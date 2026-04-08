<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'amine.lebrini@youcode.ma'],
            [
                'fullname' => 'AMINE LEBRINI',
                'username' => 'amine.lebrini',
                'link_profile' => 'https://intranet.youcode.ma/storage/users/profile/thumbnail/0.jpg',
                'password' => 'Admin@123',
                'role' => 'admin',
                'ville' => 'Benguerir',
                'campus' => 'UM6P',
                'status' => 'active',
                'etat' => 'en_attente',
            ]
        );
    }
}
