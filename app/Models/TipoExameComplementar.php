<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoExameComplementar extends Model
{
    protected $table = 'tipo_exames_complementares';

    protected $fillable = [
        'descricao'
    ];
    
    protected $hidden = ['created_at', 'updated_at'];
}
