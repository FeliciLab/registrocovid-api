<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'prontuario',
        'data_internacao',
        'instituicao_primeiro_atendimento_id',
        'instituicao_refererencia_id',
        'instituicao_id',
        'paciente_suporte_respiratorio',
        'suporte_respiratorio',
        'reinternacao',
        'coletador_id',
    ];

}
