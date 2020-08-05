<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['paciente_id', 'numero', 'tipo'];

    protected $hidden = ['tipo', 'created_at', 'updated_at', 'paciente_id'];
}
