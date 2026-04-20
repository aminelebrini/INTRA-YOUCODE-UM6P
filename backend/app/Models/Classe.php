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
        'formateur_id',
        'created_at',
        'updated_at',
    ];
    public function formateur()
    {
        return $this->belongsTo(User::class, 'formateur_id', 'id');
    }
    public function formateurs()
    {
        return $this->hasMany(User::class, 'id', 'formateur_id');
    }
    public function delegate()
    {
        return $this->belongsToMany(User::class, 'delegues', 'classe_id', 'student_id');
    }
}
