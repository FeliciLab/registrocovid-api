<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplicacaoVentilacaoMecanicaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_complicacao_id' => 'integer',
            'data_complicacao' => 'required_with:tipo_complicacao_id|date',
            'descricao' => 'nullable|string',
        ];
    }
}
