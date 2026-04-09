<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;
use App\Models\Classe;
use App\Models\Absence;
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
        $classes = Classe::with('formateurs')->get();

        return $classes;  
    }
    public function getFormateurs()
    {
        $assignedFormateurs = DB::table('users')
        ->leftJoin('formateur_classe', 'users.id', '=', 'formateur_classe.formateur_id')
        ->leftJoin('classes', 'formateur_classe.classe_id', '=', 'classes.id')
        ->select('users.id as formateur_id', 'users.fullname as formateur_name', 'classes.nom as classe_name')
        ->where('users.role', 'formateur')
        ->whereNull('formateur_classe.formateur_id')
        ->whereNull('formateur_classe.classe_id')
        ->get();
        
        return $assignedFormateurs;
    }

    public function getNotAssignedClasses()
    {
        $assignedClasses = Classe::with('formateurs')
        ->whereDoesntHave('formateurs')
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
    public function getAbsences()
    {
        return Absence::with('users', 'students','justification')->get();
    }
}


?>