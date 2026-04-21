<?php

namespace App\Http\Repository;
use App\Models\Classe;
use App\Models\Formateur;

class AssignFormateurClasseRepository
{
    public function assign($formator, $assignedClass)
    {
        return Formateur::where('user_id', $formator)->update([
            'classe_id' => $assignedClass,
        ]);
    }
}

