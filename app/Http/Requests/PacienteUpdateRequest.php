<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Validação de paciente
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            'data_inicio_sintomas' => 'date',
            'caso_confirmado' => 'bool',
            'outros_sintomas' => 'array',
            'outros_sintomas.*' => 'string',
            'sintomas' => 'array',
            'sintomas.*' => 'int|exists:sintomas,id',
        ];
    }
}
