<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoComplicacaoVM extends Model
{
    protected $table = 'tipos_complicacao_vm';

    protected $hidden = ['created_at', 'updated_at'];
}
