<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvolucaoDiariaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_evolucao' => 'required|date',
            'temperatura' => 'numeric',
            'frequencia_respiratoria' => 'integer',
            'peso' => 'numeric',
            'altura' => 'integer',
            'pressao_sistolica' => 'integer',
            'pressao_diastolica' => 'integer',
            'frequencia_cardiaca' => 'integer',
            'ausculta_pulmonar' => 'string',
            'oximetria' => 'numeric',
            'escala_glasgow' => 'integer|between:3,15',
        ];
    }
}
