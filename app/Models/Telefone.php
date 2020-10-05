<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    const TIPO_CASA = 'casa';
    const TIPO_CELULAR = 'celular';
    const TIPO_TRABALHO = 'trabalho';
    const TIPO_VIZINHO = 'vizinho';

    protected $fillable = ['paciente_id', 'numero', 'tipo'];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
