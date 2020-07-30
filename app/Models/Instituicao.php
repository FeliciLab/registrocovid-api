<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    public function paciente()
    {
       return $this->belongsTo(Paciente::class); 
    }
}
