<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtividadeProfissional extends Model
{
    protected $table = 'atividades_profissionais';
    protected $hidden = ['created_at', 'updated_at'];
}
