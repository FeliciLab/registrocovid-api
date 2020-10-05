<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pronacao extends Model
{
    protected $table = 'pronacao';

    protected $fillable = ['paciente_id', 'data_pronacao', 'quantidade_horas'];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
