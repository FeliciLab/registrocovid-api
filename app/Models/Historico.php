<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $with = [
        'drogas'
    ];

    protected $fillable = [
        'paciente_id', 'situacao_uso_drogas_id', 'tabagismo', 'etilismo'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function situacaoUsoDrogas()
    {
        return $this->belongsTo(SituacaoUsoDrogas::class, 'situacao_uso_drogas_id');
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
            $historico->paciente()->dissociate();
        });
    }
}
