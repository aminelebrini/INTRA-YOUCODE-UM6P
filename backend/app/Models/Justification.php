<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    protected $fillable = [
        'absence_id',
        'user_id',
        'fichier_path',
        'type_document',
        'date_depot'
    ];
}
