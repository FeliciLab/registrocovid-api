<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GasometriaArterial extends Model
{
    protected $table = "gasometria_arterial";
    protected $fillable = [
        'paciente_id', 'ph', 'pao2', 'paco2', 'hco3', 'be', 'sao2', 'lactato'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    protected static function booted()
    {
        static::deleting(function ($gasometriaAterial) {
            $gasometriaAterial->paciente()->dissociate();
        });
    }
}
