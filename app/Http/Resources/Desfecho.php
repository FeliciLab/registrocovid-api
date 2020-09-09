<?php

namespace App\Http\Resources;

use App\Models\TipoAutoCuidado;
use Illuminate\Http\Resources\Json\JsonResource;

class Desfecho extends JsonResource
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
            'id' => $this->id,
            'tipo_desfecho' => $this->tipoDesfecho->descricao,
            'tipo_autocuidado' => $this->tipoAutoCuidado,
            'instituicao_transferencia' => $this->instituicaoTransferencia,
            'data' => $this->data,
            'causa_obito' => $this->causa_obito,
            'obito_menos_24h' => $this->obito_menos_24h,
            'obito_em_vm' => $this->obito_em_vm,
            'obito_em_uti' => $this->obito_em_uti,
            'tipo_cuidado_paliativo' => $this->tipoCuidadoPaliativo,
        ];
    }
}
