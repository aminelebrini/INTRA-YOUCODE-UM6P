<?php

namespace App\Http\Repository;

use App\Models\Student;
use App\Models\User;
use App\Models\Formateur;
use App\Models\Classe;
use App\Models\Absence;
use App\Models\Announcement;
class DataRepository
{
    public function getUsers()
    {
        $users = User::all();

        return $users;  
    }
    public function getClasses()
    {
        $classes = Classe::with('formateur')->get();

        return $classes;  
    }
    public function getFormateurs()
    {
        // Get all formateurs without assigned classes
        $unarrangedFormateurs = Formateur::doesntHave('classes')->get();
        
        return $unarrangedFormateurs;
    }

    public function getNotAssignedClasses()
    {
        $assignedClasses = Classe::whereNull('formateur_id')->get();

        return $assignedClasses;
    }
    public function getFormateurData()
    {
        $formateurData = Formateur::with('classes')
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
        $allData = User::with('students','classes.formateur', 'absences','justifications')->get();
        return $allData;
    }
}


?>