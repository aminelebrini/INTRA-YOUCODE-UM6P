<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AssignDelegateService;

class AssignDelegateController extends Controller
{
    private $assignDelegateService;
    public function __construct(AssignDelegateService $assignDelegateService)
    {
        $this->assignDelegateService = $assignDelegateService;
    }
    public function assign(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'classe_id' => 'required|integer'
        ]);

        $this->assignDelegateService->assignDelegate(
            $request->student_id,
            $request->classe_id
        );

        return response()->json(['message' => 'Délégué assigné avec succès']);
    }
}
