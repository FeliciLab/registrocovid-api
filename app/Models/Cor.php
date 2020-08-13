<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    protected $table = 'cores';
    protected $hidden = ['created_at', 'updated_at'];
}
