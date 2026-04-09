<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StudentDataService;

class StudentDataController extends Controller
{
    private $studentDataService;
    public function __construct(StudentDataService $studentDataService)
    {
        $this->studentDataService = $studentDataService;
    }
    public function data()
    {
        $userId = auth()->user()->id;
        $studentData = $this->studentDataService->getStudentData($userId);
        if ($studentData) {
            return response()->json(['studentData' => $studentData], 200);
        } else {
            return response()->json(['message' => 'No student data found'], 404);
        }
    }
    public function Leaderboard()
    {
        $leaderboard = $this->studentDataService->getLeaderboardData();
        if ($leaderboard) {
            return response()->json(['leaderboard' => $leaderboard], 200);
        } else {
            return response()->json(['message' => 'No leaderboard data found'], 404);
        }
    }

}
