<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\AssignStudentClasseService;

class AssignStudentClasseController extends Controller
{
    private $assignStudentClasseService;
    public function __construct(AssignStudentClasseService $assignStudentClasseService)
    {
        $this->assignStudentClasseService = $assignStudentClasseService;
    }
    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer',
            'promotion' => 'required|string|max:255',
            'annee' => 'required|string|max:255',
            'formateur_id' => 'required|exists:users,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $assign = $this->assignStudentClasseService
        ->assign($request->user_id, $request->points, 
        $request->promotion, $request->annee, 
        $request->formateur_id, $request->classe_id
        );
    }
}
