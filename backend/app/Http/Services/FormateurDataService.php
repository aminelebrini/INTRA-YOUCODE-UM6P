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

    public function getFormateurData()
    {
        return $this->FormateurDataRepository->getFormateurData();
    }
    public function getStudents($formateurId)
    {
        return $this->FormateurDataRepository->getStudents($formateurId);
    }

}
?>