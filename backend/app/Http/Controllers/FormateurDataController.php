<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FormateurDataService;

class FormateurDataController extends Controller
{
    private $FormateurDataService;

    public function __construct(FormateurDataService $FormateurDataService)
    {
        $this->FormateurDataService = $FormateurDataService;
    }
    public function Data()
    {
        $user = auth()->user();
        $formateurData = $this->FormateurDataService->getFormateurData($user->id);

       if($formateurData) {
           return response()->json(['formateurData' => $formateurData], 200);
       } else {
           return response()->json(['message' => 'No formateur data found'], 404);
       }
    }
    public function getStudents()
    {
        $user = auth()->user();
        $students = $this->FormateurDataService->getStudents($user->id);

        if ($students) {
            return response()->json(['students' => $students], 200);
        } else {
            return response()->json(['message' => 'No students found for this formateur'], 404);
        }
    }
    public function getAllStudents()
    {
        $allstudents = $this->FormateurDataService->getAllStudents();

        if ($allstudents) {
            return response()->json(['allStudents' => $allstudents], 200);
        } else {
            return response()->json(['message' => 'No students found'], 404);
        }
    }
    public function getActivites()
    {
        $user = auth()->user();
        $activites = $this->FormateurDataService->getActivites($user->id);

        if ($activites) {
            return response()->json(['activites' => $activites], 200);
        } else {
            return response()->json(['message' => 'No activities found for this formateur'], 404);
        }
    }
    public function getStudentAbsences()
    {
        $user = auth()->user();
        $studentAbsences = $this->FormateurDataService->getStudentAbsences($user->id);

        if ($studentAbsences) {
            return response()->json(['studentAbsences' => $studentAbsences], 200);
        } else {
            return response()->json(['message' => 'No student absences found for this formateur'], 404);
        }
    }
}
