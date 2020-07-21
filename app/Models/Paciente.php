<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'prontuario', 'instituicao_id', 'coletador_id', 'data_internacao'
    ];
}
