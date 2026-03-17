<?php

namespace App\Http\Repository;
use App\Models\Absence;

class ValidateAbsenceRepository
{
    public function validateAbsence($absenceId, $userId)
    {
        $absence = Absence::find($absenceId);
        if ($absence && $absence->user_id == $userId) {
            $absence->status = 'justifie';
            $absence->save();
            return true;
        }
        return false;
    }
}
