<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDoenca extends Model
{
    protected $table = 'tipos_doencas';

    protected $hidden = ['created_at', 'updated_at'];

    public function doencas()
    {
        return $this->hasMany(Doenca::class);
    }
}
