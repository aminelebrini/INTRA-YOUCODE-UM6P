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
    public function assign(
        $userId, 
        $points, 
        $promotion, 
        $annee, 
        $formateurId, 
        $classeId
    )
    {
        
        return $this->assignStudentClasseRepository
        ->assignStudent(
            $userId,
            $points,
            $promotion,
            $annee,
            $formateurId,
            $classeId
        );
    }
}

?>