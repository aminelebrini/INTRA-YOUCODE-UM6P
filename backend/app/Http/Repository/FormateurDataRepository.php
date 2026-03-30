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
        ->select('users.id as formateur_id', 'users.fullname as formateur_name', 'users.email as email', 'classes.nom as classe_name'
        , 'classes.created_at as created_at', 'classes.campus', 'classes.capacite')
        ->where('users.role', 'formateur')
        ->get();
        
        return $formateurData;
    }
    public function getStudents($formateurId)
    {
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('assign_student_classe', 'students.id', '=', 'assign_student_classe.student_id')
            ->join('formateur_classe', 'assign_student_classe.classe_id', '=', 'formateur_classe.classe_id')
            ->where('formateur_classe.formateur_id', $formateurId)
            ->select('users.id as student_id', 'users.fullname as student_name', 'users.email as email')
            ->get();

        return $students;
    }
}

?>