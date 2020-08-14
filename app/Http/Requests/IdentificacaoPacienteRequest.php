<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentificacaoPacienteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'bairro_id' => 'integer|exists:bairros,id',
            'municipio_id' => 'integer|exists:municipios,id',
            'estado_id' => 'integer|exists:estados,id',
            'data_internacao' => 'date',
            'sexo' => 'max:1|in:M,F',
            'data_nascimento' => 'date',
            'estado_nascimento_id' => 'integer|exists:estados,id',
            'escolaridade_id' => 'integer|exists:escolaridades,id',
            'atividade_profissional_id' => 'integer|exists:atividades_profissionais,id',
            'qtd_pessoas_domicilio' => 'integer',
            'cor_id' => 'exists:cores,id',
            'estado_civil_id' => 'exists:estados_civis,id',
            'telefone_de_casa' => 'string|max:15',
            'telefone_celular' => 'string|max:15',
            'telefone_do_trabalho' => 'string|max:15',
            'telefone_de_vizinho' => 'string|max:15'
        ];
    }
}
