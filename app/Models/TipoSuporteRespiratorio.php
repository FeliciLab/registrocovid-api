<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSuporteRespiratorio extends Model
{
    protected $table = 'tipos_suportes_respiratorios';

    protected $hidden = ['created_at', 'updated_at', 'laravel_through_key'];
}
