<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    protected $table = 'livrable';

    protected $fillable = [
        'activite_id',
        'student_id',
        'file_path',
        'status',
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
