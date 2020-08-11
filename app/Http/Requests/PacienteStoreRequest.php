<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteStoreRequest extends FormRequest
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
            'prontuario' => 'required|unique:pacientes',
            'data_internacao' => 'required|date',
            'tipos_suporte_respiratorio' => 'array',
            'tipos_suporte_respiratorio.*.id' => 'required_with:tipos_suportes_respiratorios'
        ];
    }
}
