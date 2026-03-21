<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\ActiviteService;

class ActiviteController extends Controller
{
    private $activiteService;
    public function __construct(ActiviteService $activiteService)
    {
        $this->activiteService = $activiteService;
    }
    public function activites(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'classe_id' => 'required|integer|exists:classes,id',
            'ressource' => 'required|string',
            'etat' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $activite = $this->activiteService
        ->createActivite($request->nom,$request->description,
            $request->type,
            $request->classe_id,
            $request->ressource,
            $request->etat,
            $request->date_debut,
            $request->date_fin
        );
        if($activite){
            return response()->json(['message' => 'Activité créée avec succès', 'activite' => $activite], 201);
        } else {
            return response()->json(['message' => 'Erreur lors de la création de l\'activité',
            'activite'=> $activite], 500);
        }
    }
}
