<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExameRtPcr extends Model
{
    protected $table = 'exames_rt_pcr';

    protected $fillable = [
        'paciente_id',
        'data_coleta',
        'sitio_tipo_id',
        'data_resultado',
        'rt_pcr_resultado_id'
    ];

    public function criarExameTesteRapido($data, $pacienteId)
    {
        ExameTesteRapido::create(array_merge(
            $data,
            [
                'paciente_id' => $pacienteId
            ]
        ));
    }
}
