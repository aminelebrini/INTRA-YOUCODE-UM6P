<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AssignFormateurClasseService;

class AssignFormateurClasseController extends Controller
{
    private $AssignFormateurClasseService;

    public function __construct(AssignFormateurClasseService $AssignFormateurClasseService)
    {
        $this->AssignFormateurClasseService = $AssignFormateurClasseService;
    }

    public function assign(Request $request)
    {
        $request->validate([
            'formateur_id' => 'required|exists:users,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $result = $this->AssignFormateurClasseService
        ->assign($request->formateur_id, $request->classe_id);

        if($result)
        {
            return response()->json(['message' => 'Formateur assigned to class successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to assign formateur to class'], 500);
        }
    }
}
