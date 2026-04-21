<?php

namespace App\Http\Repository;

use App\Models\Squad;
use Illuminate\Support\Facades\DB;

class CreateSquadRepository
{
	public function createSquad($nom, $classeId, $allowedUserIds)
	{
		$squad = Squad::create([
			'nom' => $nom,
			'date_creation' => now(),
			'classe_id' => $classeId,
		]);

		if($squad)
        {
            $squadstudent = DB::table('squad_student')->insert(
                array_map(function ($userId) use ($squad) {
                    return [
                        'squad_id' => $squad->id,
                        'user_id' => $userId,
                    ];
                }, $allowedUserIds)
            );
            return $squadstudent;
        }
	}
}

