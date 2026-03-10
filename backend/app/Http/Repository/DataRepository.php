<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;

class DataRepository
{
    public function getUsers()
    {
        $users = User::all();

        return $users;  
    }
}


?>