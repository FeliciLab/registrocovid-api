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
            'data_coleta' => 'nullable|date',
            'data_realizacao' => 'nullable|required_with:resultado|date',
            'data_resultado' => 'nullable|date',
            'resultado' => 'nullable|bool',
            'rt_pcr_resultado_id' => 'nullable|integer|exists:rt_pcr_resultados,id',
            'sitio_tipo_id' => 'nullable|required_with:data_coleta|integer|exists:sitios_tipos,id',
        ];
    }
}
