<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $with = [
        'drogas'
    ];

    protected $fillable = [
        'paciente_id', 'situacao_uso_drogas_id', 'situacao_tabagismo_id', 'situacao_etilismo_id'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function situacaoUsoDrogas()
    {
        return $this->belongsTo(SituacaoUsoDrogas::class, 'situacao_uso_drogas_id');
    }
    public function situacaoTabagismo()
    {
        return $this->belongsTo(SituacaoTabagismo::class, 'situacao_tabagismo_id');
    }
    public function situacaoEtilismo()
    {
        return $this->belongsTo(SituacaoEtilismo::class, 'situacao_etilismo_id');
    }

    public function drogas()
    {
        return $this->belongsToMany(Droga::class, 'historicos_drogas');
    }

    protected static function booted()
    {
        static::deleting(function ($historico) {
            $historico->drogas()->sync([]);
            $historico->situacaoUsoDrogas()->dissociate();
            $historico->situacaoTabagismo()->dissociate();
            $historico->situacaoEtilismo()->dissociate();
            $historico->paciente()->dissociate();
        });
    }
}
