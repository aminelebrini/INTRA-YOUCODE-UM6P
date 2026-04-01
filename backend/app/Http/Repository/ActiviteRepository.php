<?php

namespace App\Http\Repository;

use App\Models\Activite;

class ActiviteRepository
{
    public function createActivite($nom, $description, $type, $formateur_id, $student_id, $binome_id, $classe_id, $ressource, $etat, $date_debut, $date_fin)
    {   
                $activite = Activite::create([
                    'nom' => $nom,
                    'description' => $description,
                    'type' => $type,
                    'formateur_id' => $formateur_id,
                    'student_id' => $student_id,
                    'binome_id' => $binome_id,
                    'classe_id' => $classe_id,
                    'ressource' => $ressource,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin
                ]);

                return $activite;
    }
}