<?php

namespace App\Http\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Classe;

class FormateurDataRepository
{
    public function getFormateurData()
    {
        $formateurData = DB::table('users')
        ->leftJoin('formateur_classe', 'users.id', '=', 'formateur_classe.formateur_id')
        ->leftJoin('classes', 'formateur_classe.classe_id', '=', 'classes.id')
        ->select('users.id as formateur_id', 'users.fullname as formateur_name', 'users.email as email', 'classes.nom as classe_name')
        ->where('users.role', 'formateur')
        ->get();
        
        return $formateurData;
    }
}

?>