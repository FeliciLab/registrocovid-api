<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuporteRespiratorio extends Model
{
    protected $table = 'suportes_respiratorios';

    protected $fillable = [
        'paciente_id',
        'tipo_suporte_id',
        'parametro',
        'data_inicio',
        'data_termino',
        'menos_24h_vmi'
    ];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
