<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSuporteRespitarioPaciente extends Model
{
    protected $table = 'tipo_suporterespiratorio_paciente';
    
    protected $fillable = [
        'tipo_suporte_id',
        'paciente_id'
    ];

}
