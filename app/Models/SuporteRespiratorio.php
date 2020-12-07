<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuporteRespiratorio extends Model
{
    protected $table = 'suportes_respiratorios';

    protected $fillable = [
        'paciente_id',
        'tipo_suporte_id',
        'fluxo_o2',
        'concentracao_o2',
        'fluxo_sangue',
        'fluxo_gasoso',
        'fio2',
        'data_inicio',
        'menos_24h_vmi'
    ];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
