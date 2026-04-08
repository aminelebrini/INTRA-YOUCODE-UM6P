<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    protected $table = 'livrable';

    protected $fillable = [
        'student_id',
        'activite_id',
        'classe_id',
        'lien_github',
        'lien_deploiment',
        'commentaire',
        'date_soumission',
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class, 'activite_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }
}
