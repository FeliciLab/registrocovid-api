<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desfecho extends Model
{
    protected $fillable = [
        'paciente_id',
        'tipo_desfecho_id',
        'tipo_autocuidado_id',
        'instituicao_transferencia_id',
        'data',
        'causa_obito',
        'obito_menos_24h',
        'obito_em_vm',
        'obito_em_uti',
        'tipo_cuidado_paliativo_id'
    ];

    protected $hidden = ['updated_at', 'created_at', 'paciente_id'];

    protected $with = [
        'tipoDesfecho',
        'tipoAutoCuidado',
        'instituicaoTransferencia',
        'tipoCuidadoPaliativo'
    ];

    public function tipoDesfecho()
    {
        return $this->hasOne(TipoDesfecho::class, 'id', 'tipo_desfecho_id');
    }

    public function tipoAutoCuidado()
    {
        return $this->hasOne(TipoAutoCuidado::class, 'id', 'tipo_autocuidado_id');
    }

    public function instituicaoTransferencia()
    {
        return $this->hasOne(Instituicao::class, 'id', 'instituicao_transferencia_id');
    }

    public function tipoCuidadoPaliativo()
    {
        return $this->hasOne(TipoCuidadoPaliativo::class, 'id', 'tipo_cuidado_paliativo_id');
    }
}
