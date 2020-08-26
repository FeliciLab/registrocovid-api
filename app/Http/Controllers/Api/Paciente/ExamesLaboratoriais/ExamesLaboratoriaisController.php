<?php

namespace App\Http\Controllers\Api\Paciente\ExamesLaboratoriais;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamesLaboratoriaisRequest;
use App\Models\ExameRtPcr;
use App\Models\ExameTesteRapido;
use App\Http\Resources\ExameRtPcr as ExameRtPcrResource;

class ExamesLaboratoriaisController extends Controller
{
    public function index($pacienteId)
    {
        $examesPcr = ExameRtPcrResource::collection(
            ExameRtPcr::where('paciente_id', $pacienteId)->get()
        );
        $examesTesteRapido = ExameTesteRapido::where('paciente_id', $pacienteId)->get();

        if (!count($examesPcr) && !count($examesTesteRapido)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui exames laboratóriais cadastrada',
                    'exames_pcr' => [],
                    'exames_teste_rapido' => []
                ], 200);
        }

        return response()->json([
            'exames_pcr' => $examesPcr,
            'exames_teste_rapido' => $examesTesteRapido->toArray()
        ]);
    }
    public function store(ExamesLaboratoriaisRequest $request, $pacienteId)
    {

        if ($request->has(['data_resultado', 'rt_pcr_resultado_id'])) {
            $exameRtPcr = ExameRtPcr::create(array_merge(
                $request->only(['data_coleta', 'sitio_tipo_id', 'data_resultado', 'rt_pcr_resultado_id']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));
        }

        if ($request->has(['data_realizacao', 'resultado'])) {
            $exameTesteRapido = ExameTesteRapido::create(array_merge(
                $request->only(['data_realizacao', 'resultado']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));
        }

        return response()->json([
            "message" => "Exames laboratóriais específicos cadastrado com sucesso",
            "exame_rt_pcr" => isset($exameRtPcr) ? $exameRtPcr->toArray() : [],
            "exame_teste_rapido" => isset($exameTesteRapido) ? $exameTesteRapido->toArray() : []
        ], 201);
    }
}
