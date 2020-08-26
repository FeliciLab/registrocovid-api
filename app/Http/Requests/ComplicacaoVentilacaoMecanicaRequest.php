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
            'tipo_transfusao_id' => 'nullable|integer|exists:tipos_transfusao,id',
            'data_transfusao' => 'required_with:tipo_transfusao_id|date',
            'volume_transfusao' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
}
