<?php

namespace App\Http\Controllers\Api\Paciente\ExameRtPcr;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExameRtPcrRequest;
use App\Models\ExameRtPcr;
use Illuminate\Http\Request;

class ExameRtPcrController extends Controller
{
    public function store(ExameRtPcrRequest $request, $pacienteId)
    {
        $exameRtPcr = ExameRtPcr::create(array_merge(
            $request->except(['data_realizacao', 'resultado']),
            [
                'paciente_id' => $pacienteId
            ]
        ));

        $exameRtPcr->criarExameTesteRapido($request->only(['data_realizacao', 'resultado']), $pacienteId);

        return response()->json([
            "message" => "Exame RT PCR cadastrado com sucesso",
        ]);
    }
}
