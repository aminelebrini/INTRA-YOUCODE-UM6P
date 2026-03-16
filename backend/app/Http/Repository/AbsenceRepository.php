<?php

namespace App\Http\Repository;
use App\Models\Absence;
use App\Models\Justification;

class AbsenceRepository
{
    public function dedicateAbsence($userId,$jour, $heureDebut, $dureeRetard, $status)
    {
        return Absence::create([
            'user_id' => $userId,
            'jour' => $jour,
            'heure_debut' => $heureDebut,
            'duree_retard' => $dureeRetard,
            'status' => $status
        ]);
    }
    public function createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot)
    {
        return Justification::create([
            'absence_id' => $absenceId,
            'user_id' => $userId,
            'fichier_path' => $fichierPath,
            'type_document' => $typeDocument,
            'date_depot' => now()
        ]);
    }
}

?>