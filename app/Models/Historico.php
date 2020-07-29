<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';

    protected $fillable = [
        'paciente_id', 'situacao_uso_drogas_id', 'tabagismo', 'etilismo'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function drogas()
    {
        return $this->belongsToMany(Droga::class, 'historico_drogas');
    }
}
