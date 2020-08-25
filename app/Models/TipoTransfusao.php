<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTransfusao extends Model
{
    protected $table = 'tipos_transfusao';

    protected $hidden = ['created_at', 'updated_at'];
}
