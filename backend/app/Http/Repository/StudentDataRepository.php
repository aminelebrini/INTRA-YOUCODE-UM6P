<?php
namespace App\Http\Repository;
use App\Models\Student;
use App\Models\Announcement;

class StudentDataRepository
{
    public function getStudentData($userId)
    {
        $studentData = Student::where('user_id', $userId)
        ->with(['user', 'formateur', 'classe.formateur', 'activites', 'livrables', 'absences', 'classe.delegate', 'liens'])
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