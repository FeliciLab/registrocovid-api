<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droga extends Model
{
    protected $fillable = [
        'descricao'
    ];

    public function historicos()
    {
        return $this->belongsToMany(Historico::class);
    }
}
