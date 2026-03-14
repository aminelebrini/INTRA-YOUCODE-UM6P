<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;

class DataRepository
{
    public function getUsers()
    {
        $users = User::all();

        return $users;  
    }
    public function getClasses()
    {
        $classes = Classe::all();

        return $classes;  
    }
    public function getFormateurs()
    {
        $assignedFormateurs = DB::table('users')
        ->leftJoin('formateur_classe', 'users.id', '=', 'formateur_classe.formateur_id')
        ->leftJoin('classes', 'formateur_classe.classe_id', '=', 'classes.id')
        ->select('users.fullname as formateur_name', 'classes.nom as classe_name')
        ->where('users.role', 'formateur')
        ->whereNull('formateur_classe.formateur_id')
        ->whereNull('formateur_classe.classe_id')
        ->get();
        
        return $assignedFormateurs;
    }

    public function getNotAssignedClasses()
    {
        $assignedClasses = DB::table('classes')
        ->leftJoin('formateur_classe', 'classes.id', '=', 'formateur_classe.classe_id')
        ->select('classes.nom as classe_name')
        ->whereNull('formateur_classe.classe_id')
        ->get();
        
        return $assignedClasses;
    }
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