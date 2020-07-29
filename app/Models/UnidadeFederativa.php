<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeFederativa extends Model
{
    protected $table = 'unidade_federativa';

    protected $hidden = ['created_at', 'updated_at', 'estado_id'];
}
