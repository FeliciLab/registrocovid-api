<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamesComplementaresRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'examescomplementares.*.tipo_exames_complementares_id' => 'integer|required',
            'examescomplementares.*.data' => 'date|required',
            'examescomplementares.*.resultado' => 'string|required|max:191',
        ];
    }
}
