<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutrosExames extends Model
{
    protected $table = 'outros_exames';

    protected $hidden = ['created_at', 'updated_at'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }

    public function tipoOutroExame()
    {
        return $this->belongsTo(TipoOutroExame::class);
    }
}
