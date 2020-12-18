<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacaoTabagismo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = 'situacao_tabagismo';
}
