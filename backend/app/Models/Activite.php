<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'type',
        'formateur_id',
        'student_id',
        'binome_id',
        'classe_id',
        'ressource',
        'date_debut',
        'date_fin'
    ];
    public function formateur()
    {
        return $this->belongsTo(User::class, 'formateur_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function binome()
    {
        return $this->belongsTo(User::class, 'binome_id');
    }

    public function users()
    {
        return $this->student();
    }
}
