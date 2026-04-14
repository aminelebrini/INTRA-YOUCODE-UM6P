<?php

namespace App\Http\Repository;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateStudentRepository
{
    public function create($fullname, $campus, $role, $studentImage, $ville, $email, $password)
    {
        $normalizedRole = strtolower(trim((string) $role));

        $username = strtolower(str_replace(' ', '', $fullname));
        $user = User::create([
            'fullname' => $fullname,
            'username' => $username,
            'link_profile' => $studentImage,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $normalizedRole,
            'ville' => $ville,
            'campus' => $campus,
            'status' => 'active',
            'etat' => 'verified',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($normalizedRole === 'etudiant') {
            return Student::create([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $user;
    }
}

?>