<?php

namespace App\Http\Repository;
use App\Models\Absence;
use App\Models\Justification;

class AbsenceRepository
{
    public function dedicateAbsence($userId,$jour, $dureeRetard)
    {
        $typeAbsence = $dureeRetard > '03:00' ? 'absence' : 'retard';

        return Absence::create([
            'user_id' => $userId,
            'jour' => $jour,
            'duree_retard' => $dureeRetard,
            'type_absence' => $typeAbsence,
        ]);
    }
    public function createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot)
    {
        return Justification::create([
            'absence_id' => $absenceId,
            'user_id' => $userId,
            'fichier_path' => $fichierPath,
            'type_document' => $typeDocument,
            'date_depot' => $dateDepot
        ]);
    }
}

?>