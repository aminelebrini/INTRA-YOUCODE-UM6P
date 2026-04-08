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

    public function getUsers()
    {
        return $this->DataRepository->getUsers();
    }
    public function getClasses()
    {
        return $this->DataRepository->getClasses();
    }
    public function getFormateurs()
    {
        return $this->DataRepository->getFormateurs();
    }
    public function getNotAssignedClasses()
    {
        return $this->DataRepository->getNotAssignedClasses();
    }
    public function getFormateurData()
    {
        return $this->DataRepository->getFormateurData();
    }
    public function getAbsences()
    {
        return $this->DataRepository->getAbsences();
    }
}

?>