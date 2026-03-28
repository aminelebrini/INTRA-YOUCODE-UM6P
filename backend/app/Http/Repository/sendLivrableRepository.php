<?php

namespace App\Http\Repository;
use App\Models\Livrable;

class SendLivrableRepository
{
    public function sendLivrable($student_id, $activite_id, $classe_id, $lien_github, $lien_deploiment, $commentaire)
    {
        $livrable = Livrable::create([
            'student_id' => $student_id,
            'activite_id' => $activite_id,
            'classe_id' => $classe_id,
            'lien_github' => $lien_github,
            'lien_deploiment' => $lien_deploiment,
            'commentaire' => $commentaire,
            'date_soumission' => now(),
        ]);

        return $livrable;
    }
}
