<?php

namespace App\Http\Repository;
use App\Models\Absence;

class AbsenceRepository
{
    public function dedicateAbsence($userId, $heureDebut, $dureeRetard, $status)
    {
        return Absence::create([
            'user_id' => $userId,
            'heure_debut' => $heureDebut,
            'duree_retard' => $dureeRetard,
            'status' => $status
        ]);
    }
}

?>