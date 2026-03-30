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
        $formateurData = $this->FormateurDataService->getFormateurData();

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
}
