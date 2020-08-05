<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentificacaoPacienteRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'bairro_id' => 'integer|exists:bairros,id',
            'data_internacao' => 'date',
            'sexo' => 'max:1|in:M,F',
            'data_nascimento' => 'date',
            'estado_nascimento_id' => 'integer|exists:estados,id',
            'escolaridade_id' => 'integer|exists:escolaridades,id',
            'atividadeprofissional_id' => 'integer|exists:atividadesprofissionais,id',
            'qtd_pessoas_domicilio' => 'integer',
            'cor_id' => 'exists:cores,id',
            'estadocivil_id' => 'exists:estadocivis,id'
        ];
    }
}
