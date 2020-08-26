<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TratamentoSuporte extends Model
{
    protected $fillable = [
        'paciente_id',
        'hemodialise',
        'data_hemodialise',
        'motivo_hemodialise',
        'frequencia_hemodialise'
    ];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
