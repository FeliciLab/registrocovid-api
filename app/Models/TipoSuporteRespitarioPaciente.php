<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSuporteRespitarioPaciente extends Model
{
    protected $table = 'tipos_suportes_respiratorios_pacientes';

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
    
    protected $fillable = [
        'tipo_suporte_id',
        'paciente_id'
    ];
}
