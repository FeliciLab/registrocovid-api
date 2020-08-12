<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExameTesteRapido extends Model
{
    protected $table = 'exames_testes_rapidos';

    protected $fillable = ['data_realizacao', 'resultado', 'paciente_id'];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
