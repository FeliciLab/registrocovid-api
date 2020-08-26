<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complicacao extends Model
{
    protected $fillable = [
        'paciente_id',
        'tipo_complicacao_id',
        'data',
        'data_termino',
        'descricao',
        'menos_24h_uti',
        'glasgow_admissao_uti',
    ];

    protected $with = [
        'tipoComplicacao',
    ];

    protected $table = 'complicacoes';

    protected $hidden = [
        'tipo_complicacao_id'
    ];

    public function tipoComplicacao()
    {
        return $this->belongsTo(TipoComplicacao::class);
    }
}
