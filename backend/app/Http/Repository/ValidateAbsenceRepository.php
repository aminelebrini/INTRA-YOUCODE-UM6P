<?php

namespace App\Http\Repository;
use App\Models\Absence;

class ValidateAbsenceRepository
{
    public function validateAbsence($absenceId, $status, $typeDocument)
    {
        $absence = Absence::where('id', $absenceId)->update([
             'status' => $status,
             'motif' => $typeDocument ? $typeDocument : null
        ]);
        return $absence;
    }
}
