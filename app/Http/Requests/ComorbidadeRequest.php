<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComorbidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'diabetes'  => 'boolean',
            'obesidade'  => 'boolean',
            'hipertensao'  => 'boolean',
            'doenca_cardiaca'  => 'boolean',
            'doenca_vascular_periferica'  => 'boolean',
            'doenca_pulmonar_cronica'  => 'boolean',
            'doenca_reumatologica'  => 'boolean',
            'neoplasia'  => 'boolean',
            'quimioterapia'  => 'boolean',
            'HIV'  => 'boolean',
            'transplantado'  => 'boolean',
            'corticosteroide'  => 'boolean',
            'doenca_autoimune'  => 'boolean',
            'doenca_renal_cronica'  => 'boolean',
            'doenca_hepatica_cronica'  => 'boolean',
            'doenca_neurologica'  => 'boolean',
            'tuberculose'  => 'boolean',
            'gestacao'  => 'boolean',
            'gestacao_semanas'  => 'int',
            'puerperio'  => 'boolean',
            'puerperio_semanas'  => 'int',
            'outras_condicoes'  => 'boolean',
            'medicacoes' => 'boolean',
            'doencas' => 'array',
            'doencas.*' => 'int|exists:doencas,id'
        ];
    }
}
