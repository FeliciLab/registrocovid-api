<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
            'prontuario' => 'required|unique:pacientes|string|max:100',
            'instituicao_id' => 'required|int',
            'data_internacao' => 'required|date',
            'coletador_id' => 'required|int',
        ];
    }
}
