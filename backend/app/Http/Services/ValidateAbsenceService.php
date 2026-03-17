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
    public function validateAbsence($absenceId, $userId)
    {
        return $this->ValidateAbsenceRepository->validateAbsence($absenceId, $userId);
    }
}

?>