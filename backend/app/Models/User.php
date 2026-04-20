<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'link_profile',
        'email',
        'password',
        'role',
        'ville',
        'campus',
        'status',
        'etat',
        'created_at',
        'updated_at',
    ];

        public function students()
        {
            return $this->hasOne(Student::class, 'user_id', 'id');
        }
        public function classes()
        {
            return $this->hasMany(Classe::class, 'formateur_id', 'id');
        }
        public function delegate()
        {
            return $this->belongsToMany(Classe::class, 'delegues', 'student_id', 'classe_id');
        }
        public function absences()
        {
            return $this->hasMany(Absence::class, 'user_id', 'id');
        }
        public function justifications()
        {
            return $this->hasMany(Justification::class, 'user_id', 'id');
        }
        public function liens()
        {
            return $this->hasMany(Lien::class, 'user_id', 'id');
        }

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
