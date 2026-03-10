<?php

namespace App\Http\Services;

use App\Http\Repository\DataRepository;


class DataService
{
    private $DataRepository;
    
    public function __construct(DataRepository $DataRepository)
    {
        $this->DataRepository = $DataRepository;
    }

    public function getStudents()
    {
        return $this->DataRepository->getStudents();
    }
}

?>