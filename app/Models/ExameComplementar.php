<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExameComplementar extends Model
{
    protected $table = 'exames_complementares';

    protected $fillable = ['paciente_id', 'tipo_exames_complementares_id', 'data', 'resultado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }

    public function tipoExamesComplementares()
    {
        return $this->belongsTo(TipoExameComplementar::class);
    }
}
