<?php

namespace App\Http\Services;
use App\Http\Repository\sendLivrableRepository;


class SendLivrableService
{
    protected $sendLivrableRepository;

    public function __construct(sendLivrableRepository $sendLivrableRepository)
    {
        $this->sendLivrableRepository = $sendLivrableRepository;
    }

    public function sendLivrable($student_id, $activite_id, $classe_id, $lien_github, $lien_deploiment, $commentaire)
    {
        return $this->sendLivrableRepository->sendLivrable($student_id, $activite_id, $classe_id, $lien_github, $lien_deploiment, $commentaire);
    }
}

?>