<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransfusaoOcorrencia extends Model
{
    protected $fillable = [
        'paciente_id',
        'tipo_transfusao_id',
        'data_transfusao',
        'volume_transfusao'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
