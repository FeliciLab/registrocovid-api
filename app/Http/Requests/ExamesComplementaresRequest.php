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
            'examescomplementares.*.tipo_outro_exame_id' => 'integer',
            'examescomplementares.*.data' => 'date',
            'examescomplementares.*.resultado' => 'string',
        ];
    }
}