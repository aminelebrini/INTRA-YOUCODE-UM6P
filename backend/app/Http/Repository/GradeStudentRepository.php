<?php

namespace App\Http\Repository;
use App\Models\Student;

class GradeStudentRepository
{
    public function gradeStudent($studentId, $binomeId, $grade)
    {
        if($studentId && !$binomeId)
        {
            $student = Student::where('user_id', $studentId)->first();
            if (!$student) {
                return null;
            }
            $student->points = $grade;
            $student->save();
            return $student;
        }else if($studentId && $binomeId)
        {
            $student1 = Student::where('user_id', $studentId)->first();
            $student2 = Student::where('user_id', $binomeId)->first();

            if (!$student1 || !$student2) {
                return null;
            }

            $student1->points = $grade;
            $student2->points = $grade;
            
            $student1->save();
            $student2->save();
            
            return [$student1, $student2];
        }
         return null;
    }
}
