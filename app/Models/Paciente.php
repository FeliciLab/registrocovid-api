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
        'data_atendimento_referencia',
        'suporte_respiratorio',
        'reinternacao',

        'coletador_id',
        'instituicao_id',
    ];

    protected $casts = [
        'suporte_respiratorio' => 'boolean',
        'reinternacao' => 'boolean',
    ];


    public function associarPacienteTipoSuporteRespiratorio($postData)
    {
        $postData = is_array($postData) ? (object) $postData : $postData;

        if (!isset($postData->tipos_suporte_respiratorio)) {
            return [];
        }

        if (is_array($postData->tipos_suporte_respiratorio)) {
            foreach ($postData->tipos_suporte_respiratorio as $suporte_id) {
                TipoSuporteRespitarioPaciente::firstOrCreate([
                    'tipo_suporte_id' => $suporte_id['id'],
                    'paciente_id' => $this->id    
                ]);
            }
        }
    }

    public function tiposuporterespiratorio()
    {
        return $this->hasMany(TipoSuporteRespitarioPaciente::class);
    }
    
    public function historico()
    {
        return $this->hasOne(Historico::class);
    }
}
