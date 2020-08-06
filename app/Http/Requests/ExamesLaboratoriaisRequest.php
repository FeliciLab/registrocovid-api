<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExameRtPcrRequest extends FormRequest
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
            'sitio_tipo_id' => 'integer|exists:sitio_tipo,id',
            'data_resultado' => 'date',
            'rt_pcr_resultado_id' => 'integer|exists:rt_pcr_resultado,id'
        ];
    }
}
