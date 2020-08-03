<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    public function tipoDoenca()
    {
        return $this->belongsTo(TipoDoenca::class);
    }
}
