<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'type',
        'user_id',
        'classe_id',
        'ressource',
        'date_debut',
        'date_fin'
    ];
}
