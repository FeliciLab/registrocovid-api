<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacaoEtilismo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $table = 'situacao_etilismo';
}
