<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model
{
    use HasFactory;

    protected $table = 'formateur';
    

    protected $fillable = [
        'user_id',
        'classe_id',
        'created_at',
    ];
    public function classes()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'formateur_id', 'user_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'user_id');
    }

    public function activites()
    {
        return $this->hasMany(Activite::class, 'formateur_id', 'user_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
