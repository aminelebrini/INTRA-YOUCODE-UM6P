<?php
 
namespace App\Http\Services;

use App\Http\Repository\CreateStudentRepository;

class CreateStudentService
{
    private $CreateStudentRepository;
    
    public function __construct(CreateStudentRepository $CreateStudentRepository)
    {
        $this->CreateStudentRepository = $CreateStudentRepository;
    }
    public function create($fullname, $campus, $role, $studentImage, $ville, $email, $password)
    {
        return $this->CreateStudentRepository->create(
            $fullname, 
            $campus, 
            $role, 
            $studentImage, 
            $ville, 
            $email, 
            $password
        );
    }
}

?>