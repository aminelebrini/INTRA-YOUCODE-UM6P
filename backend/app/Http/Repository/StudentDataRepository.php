<?php
namespace App\Http\Repository;
use App\Models\Student;

class StudentDataRepository
{
    public function getStudentData($userId)
    {
       $studentData = Student::where('user_id', $userId)
        ->with(['user', 'classe.formateurs', 'activites', 'livrables', 'absences'])
        ->first();

        return $studentData;
    }
    public function getLeaderboardData()
    {
        $leaderboard = Student::with('user', 'classe')
            ->orderByDesc('points')
            ->get();

        return $leaderboard;
    }
}