<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function comorbidades()
    {
        return $this->belongsToMany(Comorbidade::class);
    }
}
