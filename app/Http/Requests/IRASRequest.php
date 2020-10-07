<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IRASRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'iras.*.tipo_iras_id' => 'integer',
            'iras.*.data' => 'date',
            'iras.*.descricao' => 'nullable|string',
        ];
    }
}
