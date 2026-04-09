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
            'jour' => 'required|date',
            'duree_retard' => 'required|date_format:H:i',
        ]);

        $absence = $this->absenceService->dedicateAbsence(
            $request->user_id,
            $request->jour,
            $request->duree_retard,
        );

        if ($absence) {
            return response()->json(['message' => 'Absence dedicated successfully', 'absence' => $absence], 201);
        } else {
            return response()->json(['message' => 'Failed to dedicate absence'], 500);
        }
    }
    public function Absencejustification(Request $request)
    {
        $request->validate([
            'absence_id' => 'required|exists:abscences,id',
            'user_id' => 'required|exists:users,id',
            'fichier_path' => 'required|string|max:255',
            'type_document' => 'nullable|string|max:255',
            'date_depot' => 'required|date',
        ]);

        $justification = $this->absenceService->createJustification(
            $request->absence_id,
            $request->user_id,
            $request->fichier_path,
            $request->type_document,
            $request->date_depot
        );

        if ($justification) {
            return response()->json(['message' => 'Justification created successfully', 'justification' => $justification], 201);
        } else {
            return response()->json(['message' => 'Failed to create justification'], 500);
        }
    }
}
