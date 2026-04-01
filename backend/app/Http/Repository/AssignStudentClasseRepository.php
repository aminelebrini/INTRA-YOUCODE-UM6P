<?php

namespace App\Http\Repository;
use App\Models\Student;

class AssignStudentClasseRepository
{
    public function assignStudent(array $payload)
    {
        Student::where('user_id', $payload['user_id'])->update([
            'points' => $payload['points'] ?? 0,
            'promotion' => $payload['promotion'],
            'annee' => $payload['annee'],
            'formateur_id' => $payload['formateur_id'],
            'classe_id' => $payload['classe_id'],
        ]);

        return Student::where('user_id', $payload['user_id'])->first();
    }
}