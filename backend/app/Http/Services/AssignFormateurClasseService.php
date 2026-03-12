<?php

namespace App\Http\Services;
use App\Http\Repository\AssignFormateurClasseRepository;

class AssignFormateurClasseService
{
    private $AssignFormateurClasseRepository;
    public function __construct(AssignFormateurClasseRepository $AssignFormateurClasseRepository)
    {
        $this->AssignFormateurClasseRepository = $AssignFormateurClasseRepository;
    }
    public function assign($formator, $assignedClass)
    {
        return $this->AssignFormateurClasseRepository->assign($formator, $assignedClass);
    }
}
