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

    public function situacao_uso_drogas()
    {
        return $this->belongsTo(SituacaoUsoDrogas::class, 'situacao_uso_drogas_id')
    }

    public function drogas()
    {
        return $this->belongsToMany(Droga::class, 'historicos_drogas');
    }

    protected static function booted()
    {
        static::deleting(function ($Historico) {
            $this->drogas()->async([]);
            $this->situacao_uso_drogas()->detach();
            $this->paciente()->detach();
        }
    }
}
