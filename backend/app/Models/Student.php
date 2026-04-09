<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, Notifiable , HasApiTokens;

    protected $fillable = [
        'user_id',
        'points',
        'promotion',
        'annee',
        'formateur_id',
        'classe_id',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }
    public function activites()
    {
        return $this->hasMany(Activite::class, 'classe_id', 'classe_id');
    }
    public function livrables()
    {
        return $this->hasMany(Livrable::class, 'student_id', 'user_id');
    }
    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'user_id');
    }
    
}
