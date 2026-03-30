<?php

namespace App\Http\Repository;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Str;

class CreateStudentRepository
{
    public function create($fullname, $campus, $role, $studentImage, $ville, $email, $password)
    {
        $user = User::create([
            'fullname' => $fullname,
            'username' => $fullname,
            'link_profile' => $studentImage,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
            'ville' => $ville,
            'campus' => $campus,
            'status' => 'active',
            'etat' => 'verified',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if($user->role === 'formateur') {
            DB::table('formateur_classe')->insert([
                'formateur_id' => $user->id,
                'classe_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif($user->role === 'etudiant') {
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