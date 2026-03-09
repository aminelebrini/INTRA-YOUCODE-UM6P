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
}
