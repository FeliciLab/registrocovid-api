<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvolucaoDiaria extends Model
{
    protected $fillable = [
        'paciente_id',
        'data_evolucao',
        'temperatura',
        'frequencia_respiratoria',
        'peso',
        'altura',
        'pressao_sistolica',
        'pressao_diastolica',
        'frequencia_cardiaca',
        'ascultura_pulmonar',
        'oximetria',
        'escala_glasgow',
    ];

    protected $table = 'evolucoes_diarias';
}
