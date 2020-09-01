<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TipoIRAS;

class IRASResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tipoIRAS = TipoIRAS::where(
            'id',
            $this->tipo_iras_id
        )->get('descricao')->first();

        return [
            'id' => $this->id,
            'data' => $this->data,
            'descricao' => $this->descricao,
            'tipo_iras_id' => $this->tipo_iras_id,
            'tipo_iras_descricao' => $tipoIRAS['descricao']
        ];
    }
}