<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Squad extends Model
{
    use HasFactory;

    protected $table = 'squades';

    protected $fillable = [
        'nom',
        'date_creation',
        'classe_id',
    ];

    protected $casts = [
        'date_creation' => 'datetime',
    ];
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'squad_student', 'squad_id', 'user_id', 'id', 'user_id');
    }
}
