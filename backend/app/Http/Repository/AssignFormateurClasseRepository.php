<?php

namespace App\Http\Repository;
use App\Models\Classe;
use App\Models\Student;

class AssignFormateurClasseRepository
{
    public function assign($formator, $assignedClass)
    {
        $result = Classe::where('id', $assignedClass)->update([
            'formateur_id' => $formator,
        ]);

        if ($result) {
            Student::where('classe_id', $assignedClass)->update([
                'formateur_id' => $formator,
            ]);
        }

        return $result;
    }
}

