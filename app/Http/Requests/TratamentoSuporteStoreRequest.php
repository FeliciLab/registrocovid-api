<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamentoSuporteStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'tratamentos_suportes.*.data_hemodialise' => 'required|date',
            'tratamentos_suportes.*.motivo_hemodialise' => 'string',
            'tratamentos_suportes.*.frequencia_hemodialise' => 'string'
        ];
    }
}
