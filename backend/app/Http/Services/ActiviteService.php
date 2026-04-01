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
        $classe_id,
        $ressource,
        $etat,
        $date_debut,
        $date_fin
        );
    }
}


?>