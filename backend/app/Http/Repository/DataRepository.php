<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;
use App\Models\Classe;
use App\Models\Absence;
use App\Models\Announcement;
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
        $classes = DB::table('classes')
        ->leftJoin('formateur_classe', 'classes.id', '=', 'formateur_classe.classe_id')
        ->leftJoin('users', 'formateur_classe.formateur_id', '=', 'users.id')
        ->select('classes.id as classe_id', 'classes.nom as classe_name', 'users.fullname as formateur_name', 
        'classes.campus as campus', 'classes.capacite as capacite', 'classes.created_at', 'classes.promo')
        ->get();

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
    public function getAnnouncements()
    {
        return Announcement::latest()->get();
    }
    public function getAllData()
    {
        $allData = User::with('students','classes.formateurs', 'absences','justifications')->get();
        return $allData;
    }
}


?>