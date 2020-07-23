<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'prontuario',
        'instituicao_id',
        'instituicao_primeiro_atendimento_id',
        'instituicao_refererencia_id',
        'coletador_id',
        'bairro_id',
        'estado_nascimento_id',
        'cor_id',
        'estadocivil_id',
        'escolaridade_id',
        'atividadeprofissional_id',
        'data_internacao',
        'data_atendimento_referencia',
        'sexo',
        'data_nascimento',
        'qtd_pessoas_domicilio',
        'caso_confirmado',
        'data_inicio_sintomas',
    ];
}
