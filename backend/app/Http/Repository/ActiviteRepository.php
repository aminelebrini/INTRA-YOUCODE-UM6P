<?php

namespace App\Http\Repository;
use App\Models\Activite;

class ActiviteRepository
{
    public function createActivite($nom,
        $description,
        $type,
        $binome_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin)
    {
        return Activite::create([
            'nom' => $nom,
            'description' => $description,
            'type' => $type,
            'binome_id' => $binome_id,
            'ressource' => $ressource,
            'etat' => $etat,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin
        ]);
    }
    
}
?>