<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposSuportesRespiratoriosPaciente extends Model
{
    // protected $table = 'tipos_suportes_respiratorios_pacientes';

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
    
    protected $fillable = [
        'tipo_suporte_respiratorio_id',
        'paciente_id',
        'fio2',
        'fluxo_o2'
    ];

    public function paciente()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_id');
    }

    public function tipoSuporteRespiratorio()
    {
        return $this->belongsToMany(TipoSuporteRespiratorio::class, 'tipo_suporte_respiratorio_id');
    }
}
