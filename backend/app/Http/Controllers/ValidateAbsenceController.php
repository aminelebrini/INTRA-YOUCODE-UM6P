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
        'user_id' => 'required|exists:users,id',
       ]);

       $validate = $this->ValidateAbsenceService->validateAbsence($request->absence_id, $request->user_id);
       if($validate){
        return response()->json(['message' => 'Absence validée avec succès']);
       }

        return response()->json(['message' => 'Absence validée avec succès']);
    }
}
