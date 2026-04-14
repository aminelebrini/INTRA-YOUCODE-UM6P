<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function formateurs()
    {
        return $this->belongsToMany(User::class, 'formateur_classe', 'classe_id', 'formateur_id');
    }
    public function delegate()
    {
        return $this->belongsToMany(User::class, 'delegues', 'classe_id', 'student_id');
    }
}
