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
        return $this->belongsTo(Paciente::class);
    }

    public function drogas()
    {
        return $this->belongsToMany(Droga::class, 'historicos_drogas');
    }
}
