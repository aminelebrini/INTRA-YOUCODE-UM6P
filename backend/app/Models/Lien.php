<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    protected $table = 'liens';
    protected $fillable = [
        'user_id',
        'nom',
        'lien',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
