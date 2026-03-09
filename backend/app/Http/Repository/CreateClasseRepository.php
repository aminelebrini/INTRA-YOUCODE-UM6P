<?php
namespace App\Http\Repository;
use App\Models\Classe;

class CreateClasseRepository
{
    public function create($name, $capacity, $promo, $link_logo, $campus)
    {
        return Classe::create([
            'nom' => $name,
            'capacite' => $capacity,
            'promo' => $promo,
            'link_logo' => $link_logo,
            'campus' => $campus,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
?>