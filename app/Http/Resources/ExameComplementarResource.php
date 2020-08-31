<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TipoExameComplementar;


class ExameComplementarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $tipoExameComplementar = TipoExameComplementar::where(
            'id', $this->tipo_exames_complementares_id)->get('descricao')->first();

        return [
            'id' => $this->id,
            'data' => $this->data,
            'resultado' => $this->resultado,
            'tipo_exame_id' => $this->tipo_exames_complementares_id,
            'descricao' => $tipoExameComplementar['descricao']
        ];
    }
}
