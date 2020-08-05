<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    public function comorbidades()
    {
        return $this->belongsToMany(Comorbidade::class);
    }
}
