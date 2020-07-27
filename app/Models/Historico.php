<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
