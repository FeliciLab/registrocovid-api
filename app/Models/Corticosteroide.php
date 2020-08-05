<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corticosteroide extends Model
{
    public function comorbidades()
    {
        return $this->belongsToMany(Comorbidade::class);
    }
}
