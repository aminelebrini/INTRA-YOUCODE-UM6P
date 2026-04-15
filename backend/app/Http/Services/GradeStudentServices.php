<?php

namespace App\Http\Services;
use App\Http\Repository\GradeStudentRepository;

class GradeStudentServices
{
    private $gradeStudentRepository;

    public function __construct(GradeStudentRepository $gradeStudentRepository)
    {
        $this->gradeStudentRepository = $gradeStudentRepository;
    }

    public function gradeStudent($studentId, $binomeId, $grade)
    {
        return $this->gradeStudentRepository->gradeStudent($studentId, $binomeId, $grade);
    }
}
