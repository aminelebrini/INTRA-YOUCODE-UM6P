<?php

namespace App\Http\Services;
use App\Http\Repository\AssignDelegateRepository;

class AssignDelegateService
{
    private $AssignDelegateRepository;

    public function __construct(AssignDelegateRepository $AssignDelegateRepository)
    {
        $this->AssignDelegateRepository = $AssignDelegateRepository;
    }
    public function assignDelegate($student_id, $classe_id)
    {
        return $this->AssignDelegateRepository->assignDelegate($student_id, $classe_id);
    }
}


?>