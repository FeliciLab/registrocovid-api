<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IRAS extends Model
{
    protected $table = 'iras';

    protected $fillable = ['paciente_id', 'tipo_iras_id', 'data', 'descricao'];

    protected $hidden = ['created_at', 'updated_at'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }

    public function tipoIRAS()
    {
        return $this->belongsTo(TipoIRAS::class);
    }
}