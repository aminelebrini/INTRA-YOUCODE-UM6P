<?php

namespace App\Http\Services;
use App\Http\Repository\AnnouncementRepository;

class AnnouncementService
{
    private $AnnouncementRepository;

    public function __construct(AnnouncementRepository $AnnouncementRepository)
    {
        $this->AnnouncementRepository = $AnnouncementRepository;
    }
    public function createAnnouncement($titre, $description, $status, $categorie, $cible)
    {
        return $this->AnnouncementRepository->createAnnouncement($titre, $description, $status, $categorie, $cible);
    }
}
?>