<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoIRAS extends Model
{
    protected $table = 'tipo_iras';

    protected $fillable = [
        'descricao'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
