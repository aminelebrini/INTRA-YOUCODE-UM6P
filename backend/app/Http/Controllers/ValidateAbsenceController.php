<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\ValidateAbsenceService;

class ValidateAbsenceController extends Controller
{
    private $ValidateAbsenceService;
    public function __construct(ValidateAbsenceService $ValidateAbsenceService)
    {
        $this->ValidateAbsenceService = $ValidateAbsenceService;
    }
    public function validateAbsence(Request $request)
    {
       $request->validate([
        'absence_id' => 'required|exists:abscences,id',
        'status' => 'required|in:justifie,not_justifie',
        'motif' => 'nullable|string|max:255',
       ]);

       $validate = $this->ValidateAbsenceService->validateAbsence($request->absence_id, $request->status, $request->motif);
       if($validate){
        return response()->json(['message' => 'Absence validée avec succès']);
       }

        return response()->json(['message' => 'Absence validée avec succès']);
    }
}
