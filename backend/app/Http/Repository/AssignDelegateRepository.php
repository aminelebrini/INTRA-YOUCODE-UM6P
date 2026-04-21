<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;

class AssignDelegateRepository
{
    public function assignDelegate($student_id, $classe_id)
    {
        return DB::transaction(function () use ($student_id, $classe_id) {
            DB::table('delegues')->where('classe_id', $classe_id)->delete();

            return DB::table('delegues')->insert([
                'student_id' => $student_id,
                'classe_id' => $classe_id,
            ]);
        });
    }
}

?>