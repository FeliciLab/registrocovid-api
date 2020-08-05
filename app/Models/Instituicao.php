<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    protected $hidden = ['created_at', 'updated_at', 'estudo'];
    /**
     * @return BelongsTo
     */
    public function pacienteInstituicaoPrimeiroAtendimento()
    {
       return $this->belongsTo(Paciente::class);
    }
}
