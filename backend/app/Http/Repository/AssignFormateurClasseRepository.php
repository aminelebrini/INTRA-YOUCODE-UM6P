<?php

namespace App\Http\Repository;
use Illuminate\Support\Facades\DB;

class AssignFormateurClasseRepository
{
    public function assign($formator, $assignedClass)
    {
        $result = DB::table('formateur_classe')->insert([
            'formateur_id' => $formator,
            'classe_id' => $assignedClass,
        ]);
        return $result;
    }
}

