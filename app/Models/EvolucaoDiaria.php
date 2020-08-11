<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvolucaoDiaria extends Model
{
    protected $fillable = ['paciente_id'];
    protected $table = 'evolucao_diaria'; 
}
