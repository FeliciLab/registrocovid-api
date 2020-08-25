<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoComplicacao extends Model
{
    protected $table = 'tipos_complicacoes';

    protected $hidden = ['created_at', 'updated_at'];

    // public function complicacoes()
    // {
    //     return $this->hasMany(Complicacao::class);
    // }
}
