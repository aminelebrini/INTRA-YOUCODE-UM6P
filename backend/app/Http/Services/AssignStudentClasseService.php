<?php

namespace App\Http\Services;
use App\Http\Repository\AssignStudentClasseRepository;

class AssignStudentClasseService
{
    private $assignStudentClasseRepository;
    public function __construct(AssignStudentClasseRepository $assignStudentClasseRepository)
    {
        $this->assignStudentClasseRepository = $assignStudentClasseRepository;
    }
    public function assign(array $payload)
    {
        return $this->assignStudentClasseRepository->assignStudent($payload);
    }
}

?>