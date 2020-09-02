<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class TratamentoSuporte extends Model
{
    protected $fillable = [
        'paciente_id',
        'hemodialise',
        'motivo_hemodialise',
        'frequencia_hemodialise',
        'data_inicio',
        'data_termino'
    ];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }
}
