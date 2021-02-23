<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerapiaTranfusionalRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_transfusao' => 'required|date',
            'tipo_transfusao_id' => 'required|integer|exists:tipos_transfusao,id',
            'volume_transfusao' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
}
