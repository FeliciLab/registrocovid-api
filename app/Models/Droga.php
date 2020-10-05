<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droga extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'descricao'
    ];

    public function historicos()
    {
        return $this->belongsToMany(Historico::class);
    }
}
