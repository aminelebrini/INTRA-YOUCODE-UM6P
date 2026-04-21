<?php

namespace App\Http\Controllers;

use App\Http\Services\CreateSquadService;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;

class CreateSquadController extends Controller
{
    private $createSquadService;

    public function __construct(CreateSquadService $createSquadService)
    {
        $this->createSquadService = $createSquadService;
    }

    public function create(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'classe_id' => 'required|integer|exists:classes,id',
            'student_user_ids' => 'required|array|min:1|max:5',
            'student_user_ids.*' => 'required|integer|distinct|exists:users,id',
        ]);

        $squad = $this->createSquadService->create($request->nom, $request->classe_id,$request->student_user_ids);

        if($squad)
        {
            return response()->json([
                'message' => 'Squad créée avec succès',
                'squad' => $squad
            ], 201);
        }else
        {
            return response()->json([
                'message' => 'Erreur lors de la création du squad'
            ], 500);
        }
    }
}
