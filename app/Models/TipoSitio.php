<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSitio extends Model
{
    protected $table = 'sitios_tipos';
    protected $hidden = ['created_at', 'updated_at'];
}
