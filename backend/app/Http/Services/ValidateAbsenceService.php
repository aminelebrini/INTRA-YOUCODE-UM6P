<?php

namespace App\Http\Services;
use App\Http\Repository\ValidateAbsenceRepository;

class ValidateAbsenceService
{
    private $ValidateAbsenceRepository;
    public function __construct(ValidateAbsenceRepository $ValidateAbsenceRepository)
    {
        $this->ValidateAbsenceRepository = $ValidateAbsenceRepository;
    }
    public function validateAbsence($absenceId, $status, $typeDocument)
    {
        return $this->ValidateAbsenceRepository->validateAbsence($absenceId, $status, $typeDocument);
    }
}

?>