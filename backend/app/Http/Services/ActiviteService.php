<?php

namespace App\Http\Services;
use App\Http\Repository\ActiviteRepository;

class ActiviteService
{
    private $activiteRepository;
    public function __construct(ActiviteRepository $activiteRepository)
    {
        $this->activiteRepository = $activiteRepository;
    }
    public function createActivite($nom,
        $description,
        $type,
        $formateur_id,
        $student_id,
        $binome_id,
        $classe_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin)
    {
        return $this->activiteRepository->createActivite($nom,
        $description,
        $type,
        $formateur_id,
        $student_id,
        $binome_id,
        $classe_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin
        );
    }

    public function updateActivite($id,
        $nom,
        $description,
        $type,
        $formateur_id,
        $student_id,
        $binome_id,
        $classe_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin)
    {
        return $this->activiteRepository->updateActivite($id,
        $nom,
        $description,
        $type,
        $formateur_id,
        $student_id,
        $binome_id,
        $classe_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin
        );
    }
}


?>
