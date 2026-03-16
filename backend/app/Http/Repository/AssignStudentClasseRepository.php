<?php

namespace App\Http\Repository;
use App\Models\Student;

class AssignStudentClasseRepository
{
    public function assignStudent(
        $studentId, 
        $points, 
        $promotion, 
        $annee, 
        $formateurId, 
        $classeId
    )
    {
        $student = Student::create([
            'user_id' => $studentId,
            'points' => $points,
            'promotion' => $promotion,
            'annee' => $annee,
            'formateur_id' => $formateurId,
            'classe_id' => $classeId
        ]);
    }
}
?>