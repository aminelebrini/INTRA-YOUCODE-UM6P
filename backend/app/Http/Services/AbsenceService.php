<?php

namespace App\Http\Services;
use App\Http\Repository\AbsenceRepository;

class AbsenceService
{
    private $AbsenceRepository;

    public function __construct(AbsenceRepository $AbsenceRepository)
    {
        $this->AbsenceRepository = $AbsenceRepository;
    }
    public function dedicateAbsence($userId, $jour, $heureDebut, $dureeRetard, $status)
    {
        return $this->AbsenceRepository->dedicateAbsence($userId, $jour, $heureDebut, $dureeRetard, $status);
    }
    public function createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot)
    {
        return $this->AbsenceRepository->createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot);
    }
}

?>