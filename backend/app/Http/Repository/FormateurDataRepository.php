<?php

namespace App\Http\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Activite;

class FormateurDataRepository
{
    public function getFormateurData($userId)
    {
        $formateurData = DB::table('users')
        ->leftJoin('formateur_classe', 'users.id', '=', 'formateur_classe.formateur_id')
        ->leftJoin('classes', 'formateur_classe.classe_id', '=', 'classes.id')
        ->select('users.id as formateur_id', 'users.fullname as formateur_name', 'users.email as email', 'classes.link_logo' , 'classes.nom as classe_name'
        , 'classes.id as classe_id', 'classes.created_at as created_at', 'classes.campus', 'classes.capacite')
        ->where('users.role', 'formateur')
        ->where('users.id', $userId)
        ->get();
        
        return $formateurData;
    }
    public function getStudents($formateurId)
    {
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('formateur_classe', 'students.classe_id', '=', 'formateur_classe.classe_id')
            ->leftJoin('classes', 'students.classe_id', '=', 'classes.id')
            ->where('formateur_classe.formateur_id', $formateurId)
            ->select('users.id as student_id', 'users.fullname as student_name', 'users.email as email'
            , 'users.link_profile as student_image', 'students.points', 'students.promotion', 'students.annee',
             'classes.nom', 'users.status', 'users.ville')
            ->get();

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
        $studentAbsences = Absence::with('users', 'users.student')
        ->where('users.student.formateur_id', $formateurId)
        ->get();

        return $studentAbsences;
    }
}

?>