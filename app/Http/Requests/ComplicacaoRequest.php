<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplicacaoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.tipo_complicacao_id' => 'required|integer',
            '*.data' => 'required|date',
            '*.data_termino' => 'date',
            '*.descricao' => 'string|max:100',
            '*.menos_24h_uti' => 'boolean',
            '*.glasglow_admissao_uti' => 'integer',
        ];
    }
}
