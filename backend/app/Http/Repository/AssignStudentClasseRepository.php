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
        $retuStudent = Student::find($studentId);

        $student = Student::where('id', $studentId)->
        update([
            'points' => $points,
            'promotion' => $promotion,
            'annee' => $annee,
            'formateur_id' => $formateurId,
            'classe_id' => $classeId,
        ]);
    }
}
?>