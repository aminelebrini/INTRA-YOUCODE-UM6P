<?php

namespace App\Http\Controllers;
use App\Http\Services\AbsenceService;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    private $absenceService;
    public function __construct(AbsenceService $absenceService)
    {
        $this->absenceService = $absenceService;
    }
    public function dedicateAbsence(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'heure_debut' => 'required|date',
            'duree_retard' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
        ]);

        $absence = $this->absenceService->dedicateAbsence(
            $request->user_id,
            $request->heure_debut,
            $request->duree_retard,
            $request->status,
            $request->motif,
            $request->justification
        );

        if ($absence) {
            return response()->json(['message' => 'Absence dedicated successfully', 'absence' => $absence], 201);
        } else {
            return response()->json(['message' => 'Failed to dedicate absence'], 500);
        }
    }
}
