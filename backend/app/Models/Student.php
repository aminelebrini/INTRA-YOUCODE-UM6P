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
}
