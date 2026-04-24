<?php
namespace App\Http\Services;
use App\Http\Repository\CreateClasseRepository;


class CreateClasseService
{
    private $CreateClasseRepository;
    
    public function __construct(CreateClasseRepository $CreateClasseRepository)
    {
        $this->CreateClasseRepository = $CreateClasseRepository;
    }
    public function create($name, $capacity, $promo, $link_logo, $campus)
    {
        return $this->CreateClasseRepository->create(
            $name, 
            $capacity, 
            $promo, 
            $link_logo, 
            $campus
        );
    }

    public function update($id, $name, $capacity, $promo, $link_logo, $campus)
    {
        return $this->CreateClasseRepository->update(
            $id,
            $name,
            $capacity,
            $promo,
            $link_logo,
            $campus
        );
    }
}


?>
