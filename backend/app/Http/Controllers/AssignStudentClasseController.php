<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\AssignStudentClasseService;
use Throwable;

class AssignStudentClasseController extends Controller
{
    private $assignStudentClasseService;
    public function __construct(AssignStudentClasseService $assignStudentClasseService)
    {
        $this->assignStudentClasseService = $assignStudentClasseService;
    }
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:students,user_id',
            'points' => 'nullable|integer|min:0',
            'promotion' => 'required|string|max:255',
            'annee' => 'required|string|max:255',
            'formateur_id' => 'required|exists:users,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        try {
            $assign = $this->assignStudentClasseService->assign([
                'user_id' => $validated['user_id'],
                'points' => $validated['points'] ?? 0,
                'promotion' => $validated['promotion'],
                'annee' => $validated['annee'],
                'formateur_id' => $validated['formateur_id'],
                'classe_id' => $validated['classe_id'],
            ]);

            return response()->json([
                'message' => 'Student assigned successfully.',
                'student' => $assign,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Unable to assign student to class.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
