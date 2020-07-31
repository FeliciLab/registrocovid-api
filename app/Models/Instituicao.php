<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    public function paciente_instituicao_primeiro_atendimento()
    {
       return $this->belongsTo(Paciente::class, 'id', 'instituicao_primeiro_atendimento_id'); 
    }
}
