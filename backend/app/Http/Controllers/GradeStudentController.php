<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GradeStudentServices;

class GradeStudentController extends Controller
{
    private $gradeStudentService;
    public function __construct(GradeStudentServices $gradeStudentService)
    {
        $this->gradeStudentService = $gradeStudentService;
    }
    public function gradeStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:users,id',
            'binome_id' => 'nullable|integer|exists:users,id',
            'grade' => 'required|numeric|min:0|max:100',
        ]);

        $grade = $this->gradeStudentService->gradeStudent($request->student_id, $request->binome_id, $request->grade);
        if ($grade) {
            return response()->json(['message' => 'Grade submitted successfully', 'grade' => $grade], 201);
        } else {
            return response()->json(['message' => 'Failed to submit grade'], 500);
        }
    }
}
