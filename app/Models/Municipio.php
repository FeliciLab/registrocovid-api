<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $hidden = ['created_at', 'updated_at', 'estado', 'estado_id'];

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
    }
}
