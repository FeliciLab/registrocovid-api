<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplicacaoVentilacaoMec extends Model
{
    protected $table = 'complicacoes_ventilacao_mec';

    protected $fillable = [
        'paciente_id',
        'tipo_complicacao_id',
        'data_ventilacao_mec',
        'descricao'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
