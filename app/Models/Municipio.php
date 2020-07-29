<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $hidden = ['created_at', 'updated_at', 'estado_id'];

    public function estados()
    {
        return $this->belongsTo(Estado::class);
    }
}
