<?php

namespace App\Http\Repository;

use App\Models\Activite;

class ActiviteRepository
{
    public function createActivite($nom, $description, $type, $formateur_id, $classe_id, $ressource, $etat, $date_debut, $date_fin)
    {   
                $activite = Activite::create([
                    'nom' => $nom,
                    'description' => $description,
                    'type' => $type,
                    'formateur_id' => $formateur_id,
                    'classe_id' => $classe_id,
                    'ressource' => $ressource,
                    'etat' => $etat,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin
                ]);

                $date = now().toDateString();
                if($date_debut < $date){
                     $activite->etat = 'pending';
                     $activite->save();
                }
                if($date_debut >= $date && $date_fin < $date){
                    $activite->etat = 'en cours';
                    $activite->save();
                }
                 if($date_fin >= $date){
                    $activite->etat = 'terminé';
                    $activite->save();
                 }
                 
                return $activite;
    }
}