<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}
