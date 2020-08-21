<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExameRtPcr extends JsonResource
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
            'data_coleta' => $this->data_coleta,
            'data_resultado' => $this->data_resultado,
            'sitio_tipo' => $this->sitiosTipos->descricao,
            'rt_pcr_resultado' => $this->rtPcrResultados
        ];
    }
}
