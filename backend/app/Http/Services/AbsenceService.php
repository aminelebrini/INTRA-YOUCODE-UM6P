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
    public function dedicateAbsence($userId, $jour, $dureeRetard)
    {
        return $this->AbsenceRepository->dedicateAbsence($userId, $jour, $dureeRetard);
    }
    public function createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot)
    {
        return $this->AbsenceRepository->createJustification($absenceId, $userId, $fichierPath, $typeDocument, $dateDepot);
    }
}

?>