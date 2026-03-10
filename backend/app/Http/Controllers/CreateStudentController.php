<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CreateStudentService;
use Illuminate\Support\Facades\Log;

class CreateStudentController extends Controller
{
    private $CreateStudentService;

    public function __construct(CreateStudentService $CreateStudentService)
    {
        $this->CreateStudentService = $CreateStudentService;
    }

    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'campus' => 'required|string',
            'role' => 'required|string',
            'link_profile' => 'nullable|url',
            'ville' => 'required|string',
            'password' => 'required|min:6'
        ]);
        $student = $this->CreateStudentService->create(
            $request->fullname,
            $request->campus,
            $request->role,
            $request->link_profile,
            $request->ville,

            $request->email,
            $request->password
        );
        if ($student) {
            return response()->json(['message' => 'Student created successfully', 'student' => $student], 201);
        } else {
            return response()->json(['message' => 'Failed to create student'], 500);
        }
    }

}
