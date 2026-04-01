<?php

namespace App\Http\Services;
use App\Http\Repository\FormateurDataRepository;

class FormateurDataService
{
    private $FormateurDataRepository;
    
    public function __construct(FormateurDataRepository $FormateurDataRepository)
    {
        $this->FormateurDataRepository = $FormateurDataRepository;
    }

    public function getFormateurData($userId)
    {
        return $this->FormateurDataRepository->getFormateurData($userId);
    }
    public function getStudents($formateurId)
    {
        return $this->FormateurDataRepository->getStudents($formateurId);
    }
    public function getAllStudents()
    {
        return $this->FormateurDataRepository->getAllStudents();
    }
    public function getActivites($formateurId)
    {
        return $this->FormateurDataRepository->getActivites($formateurId);
    }

}
?>