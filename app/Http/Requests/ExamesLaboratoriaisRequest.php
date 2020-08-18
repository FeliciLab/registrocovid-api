<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamesLaboratoriaisRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_resultado' => 'nullable|date',
            'rt_pcr_resultado_id' => 'nullable|integer|exists:rt_pcr_resultados,id',
        ];
    }
}
