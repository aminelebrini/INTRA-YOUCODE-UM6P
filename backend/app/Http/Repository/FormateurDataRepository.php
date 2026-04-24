<?php

namespace App\Http\Repository;
use App\Models\User;
use App\Models\Classe;
use App\Models\Absence;
use App\Models\Student;
use App\Models\Activite;
use App\Models\Squad;
use App\Models\Livrable;

class FormateurDataRepository
{
    public function getFormateurData($userId)
    {
        $formateurData = User::with('classes', 'classes.delegate')->where('id', $userId)->get();
    
        return $formateurData;
    }
    public function getStudents($formateurId)
    {
        $students = Student::with('user', 'classe', 'formateur', 'squads')->where('formateur_id', $formateurId)->get();

        return $students;
    }
    public function getAllStudents()
    {
        $allstudents = Student::where('classe_id', '=', null)
        ->with('user')
        ->get();

        return $allstudents;
    }
    public function getActivites($formateurId)
    {
        $activites = Activite::with(['student', 'binome'])->
        where('formateur_id', $formateurId)
        ->get();

        return $activites;
    }
    public function getStudentAbsences($formateurId)
    {
        $studentAbsences = Absence::whereHas('user.student', function ($query) use ($formateurId) {
            $query->where('formateur_id', $formateurId);
        })
        ->with('user', 'user.student')
        ->get();

        return $studentAbsences;
    }

    public function getSquads($formateurId)
    {
        $formateur = User::with('classes')->find($formateurId);
        $classeId = $formateur?->classes?->id;

        if (!$classeId) {
            return collect();
        }

        return Squad::with(['students.user'])
            ->where('classe_id', $classeId)
            ->get();
    }

    public function getLivrables($formateurId)
    {
        $formateur = User::with('classes')->find($formateurId);
        $classeId = $formateur?->classes?->id;

        if (!$classeId) {
            return collect();
        }

        return Livrable::with(['activite', 'student.user'])
            ->where('classe_id', $classeId)
            ->latest('date_soumission')
            ->get();
    }
}

?>
