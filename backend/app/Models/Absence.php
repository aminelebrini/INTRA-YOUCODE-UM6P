<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Absence extends Model
{
    protected $table = 'abscences';
    protected $fillable = [
        'user_id',
        'jour',
        'heure_debut',
        'duree_retard',
        'type_absence',
        'status',
        'motif',
        'justification',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function justification()
    {
        return $this->hasOne(Justification::class, 'absence_id', 'id');
    }
    public function students()
    {
        return $this->belongsTo(Student::class, 'user_id', 'user_id');
    }
}
