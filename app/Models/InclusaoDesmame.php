<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InclusaoDesmame extends Model
{
    protected $table = 'inclusao_desmame';

    protected $fillable = ['paciente_id', 'data_inclusao_desmame'];

    protected $hidden = ['created_at', 'updated_at', 'paciente_id'];
}
