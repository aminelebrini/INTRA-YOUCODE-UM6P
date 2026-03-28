<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\SendLivrableService;

class SendLivrableController extends Controller
{
    protected $sendLivrableService;

    public function __construct(SendLivrableService $sendLivrableService)
    {
        $this->sendLivrableService = $sendLivrableService;
    }
    public function sendLivrable(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'activite_id' => 'required|exists:activites,id',
            'classe_id' => 'required|exists:classes,id',
            'lien_github' => 'required|string',
            'lien_deploiment' => 'nullable|string',
            'commentaire' => 'required|string',
        ]);

        $livrable = $this->sendLivrableService->sendLivrable(
            $request->student_id,
            $request->activite_id,
            $request->classe_id,
            $request->lien_github,
            $request->lien_deploiment,
            $request->commentaire
        );
        if ($livrable) {
            return response()->json(['message' => 'Livrable envoyé avec succès', 'data' => $livrable], 201);
        } else {
            return response()->json(['message' => 'Erreur lors de l\'envoi du livrable'], 500);
        }
    }

}
