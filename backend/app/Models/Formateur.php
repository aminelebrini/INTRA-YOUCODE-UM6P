<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = [];

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'role',
        'ville',
        'campus',
        'link_profile',
        'status',
        'etat',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function classes()
    {
        return $this->hasMany(Classe::class, 'formateur_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'formateur_id', 'id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'id');
    }

    public function activites()
    {
        return $this->hasMany(Activite::class, 'formateur_id', 'id');
    }

    // Global scope to filter only formateurs
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('formateur', function ($query) {
            $query->where('role', 'formateur');
        });
    }
}
