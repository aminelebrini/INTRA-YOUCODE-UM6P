<?php

namespace App\Http\Repository;

use App\Models\Formateur;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateStudentRepository
{
    public function create($fullname, $campus, $role, $linkProfile, $ville, $email, $password)
    {
        return DB::transaction(function () use ($fullname, $campus, $role, $linkProfile, $ville, $email, $password) {
            $normalizedRole = strtolower(trim((string) $role));


            $username = strtolower(trim((string) $fullname));
            $user = User::create([
                'fullname' => $fullname,
                'username' => $username,
                'link_profile' => $linkProfile,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => $normalizedRole,
                'ville' => $ville,
                'campus' => $campus,
                'status' => 'active',
                'etat' => 'verified',
            ]);

            if ($normalizedRole === 'etudiant') {
                Student::create([
                    'user_id' => $user->id,
                ]);
            } elseif ($normalizedRole === 'formateur') {
                Formateur::create([
                    'user_id' => $user->id,
                ]);
            }

            return $user->fresh();
        });
    }
}

?>