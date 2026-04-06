<?php
namespace App\Http\Services;
use App\Http\Repository\StudentDataRepository;

class StudentDataService
{
    private $studentDataRepository;

    public function __construct(StudentDataRepository $studentDataRepository)
    {
        $this->studentDataRepository = $studentDataRepository;
    }

    public function getStudentData($userId)
    {
        return $this->studentDataRepository->getStudentData($userId);
    }
}

?>