<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Formateur;

class Classe extends Model
{
    protected $fillable = [
        'nom',
        'capacite',
        'promo',
        'link_logo',
        'campus',
        'created_at',
        'updated_at',
    ];
    public function formateur()
    {
        return $this->hasOneThrough(User::class, Formateur::class, 'classe_id', 'id', 'id', 'user_id');
    }
    public function delegate()
    {
        return $this->belongsToMany(User::class, 'delegues', 'classe_id', 'student_id');
    }
}
