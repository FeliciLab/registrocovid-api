<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesfechoStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.tipo_desfecho_id' => 'required|integer|exists:tipo_desfechos,id',
            '*.tipo_autocuidado_id' => 'nullable|integer|exists:tipo_auto_cuidados,id',
            '*.instituicao_transferencia_id' => 'nullable|integer|exists:instituicoes,id',
            '*.data' => 'required|date',
            '*.causa_obito' => 'nullable|string|max:191',
            '*.obito_menos_24h' => 'nullable|bool',
            '*.obito_em_vm' => 'nullable|bool',
            '*.obito_em_uti' => 'nullable|bool',
            '*.tipo_cuidado_paliativo_id' => 'nullable|integer|exists:tipo_cuidado_paliativos,id'
        ];
    }
}
