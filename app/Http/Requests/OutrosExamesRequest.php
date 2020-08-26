<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutrosExamesRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'outrosexames.*.tipo_outro_exame_id' => 'integer',
            'outrosexames.*.data' => 'date',
            'outrosexames.*.resultado' => 'string',
        ];
    }
}