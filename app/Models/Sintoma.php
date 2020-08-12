<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}
