<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estadocivis';

    protected $hidden = ['created_at', 'updated_at'];
}
