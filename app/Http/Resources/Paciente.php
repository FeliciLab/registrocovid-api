<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paciente extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'prontuario' => $this->prontuario,
            'sexo' => $this->sexo,
            'data_nascimento' => $this->data_nascimento,
            'qtd_pessoas_domicilio' => $this->qtd_pessoas_domicilio,
            'instituicao_primeiro_atendimento' => $this->instituicao_primeiro_atendimento,
            'instituicao_refererencia' => $this->instituicao_refererencia,
            'cor' => $this->cor,
            'estado_civil' => $this->estado_civil,
            'escolaridade' => $this->escolaridade,
            'atividade_profissional' => $this->atividade_profissional,
            'estado' => $this->estado,
            'municipio' => $this->municipio,
            'telefones' => $this->telefones
        ];
    }
}
