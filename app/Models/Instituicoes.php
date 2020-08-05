<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicoes extends Model
{
    protected $table = 'instituicoes';

    protected $hidden = ['created_at', 'updated_at', 'estudo'];
}
