<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSitio extends Model
{
    protected $table = 'sitio_tipo';

    protected $hidden = ['created_at', 'updated_at'];
}
