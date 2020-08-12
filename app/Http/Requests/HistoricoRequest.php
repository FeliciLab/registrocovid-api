<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoricoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'situacao_uso_drogas_id' => 'int|exists:situacoes_uso_drogas,id',
            'tabagismo' => 'boolean',
            'etilismo' => 'boolean',
            'drogas' => 'array',
            'drogas.*' => 'int|exists:drogas,id'
        ];
    }
}
