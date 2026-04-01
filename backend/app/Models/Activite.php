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
}
