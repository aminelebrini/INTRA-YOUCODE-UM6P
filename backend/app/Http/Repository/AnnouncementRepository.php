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
            'cible' => $cible
        ]);
    }
    public function getAnnouncements()
    {
        return Announcement::all();
    }

    public function updateAnnouncement($id, $titre, $description, $status, $categorie, $cible)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'titre' => $titre,
            'description' => $description,
            'status' => $status,
            'categorie' => $categorie,
            'cible' => $cible,
        ]);

        return $announcement;
    }
}

?>
