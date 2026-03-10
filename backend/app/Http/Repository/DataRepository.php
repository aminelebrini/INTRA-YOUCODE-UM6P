<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;

class DataRepository
{
    public function getStudents()
    {
        return User::where('role', 'etudiant')->get();
    }
}


?>