<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class AssignDelegateRepository
{
    public function assignDelegate($student_id, $classe_id)
    {
        $delegate = DB::table('delegues')
        ->insert([
            'student_id' => $student_id,
            'classe_id' => $classe_id
        ]);

        return $delegate;   
    }
}

?>