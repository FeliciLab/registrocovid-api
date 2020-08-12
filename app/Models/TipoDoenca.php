<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDoenca extends Model
{

    public function doencas()
    {
        return $this->hasMany(Doenca::class);
    }
}
