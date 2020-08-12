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
            'data_coleta' => 'date',
            'sitio_tipo_id' => 'integer|exists:sitios_tipos,id',
            'data_resultado' => 'date',
            'rt_pcr_resultado_id' => 'integer|exists:rt_pcr_resultados,id',
            'resultado' => 'bool',
            'data_realizacao' => 'date'
        ];
    }
}
