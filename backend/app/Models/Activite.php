<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'type',
        'binome_id',
        'ressource',
        'etat',
        'date_debut',
        'date_fin'
    ];
}
