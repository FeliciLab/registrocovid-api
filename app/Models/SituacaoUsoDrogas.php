<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacaoUsoDrogas extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = 'situacoes_uso_drogas';
}
