<?php
namespace App\Http\Repository;
use App\Models\Student;

class StudentDataRepository
{
    public function getStudentData($userId)
    {
       $studentData = Student::where('user_id', $userId)
        ->with(['user', 'classe'])
        ->first();

        return $studentData;
    }
}
?>