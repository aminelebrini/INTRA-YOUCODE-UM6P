<?php

namespace App\Http\Repository;
use App\Models\Announcement;

class AnnouncementRepository
{
    public function createAnnouncement($titre, $description, $status, $categorie, $cible)
    {
        return Announcement::create([
            'titre' => $titre,
            'description' => $description,
            'status' => $status,
            'categorie' => $categorie,
            'cible' => $cible,
        ]);
    }
}

?>