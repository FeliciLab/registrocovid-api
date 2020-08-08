<?php

namespace App\Http\Controllers\Api\Paciente\ExamesLaboratoriais;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamesLaboratoriaisRequest;
use App\Models\ExameRtPcr;
use App\Models\ExameTesteRapido;
use Illuminate\Http\Request;

class ExamesLaboratoriaisController extends Controller
{
    public function index($pacienteId)
    {
        $examesPcr =  ExameRtPcr::where('paciente_id', $pacienteId)->get();
        $examesTesteRapido = ExameTesteRapido::where('paciente_id', $pacienteId)->get();

        if(!count($examesPcr)){
            return response()->json(['message' => 'Paciente não possui exames laboratóriais cadastrada'], 404);
        }

        return response()->json([
            'exames_pcr' => $examesPcr->toArray(),
            'exames_teste_rapido' => $examesTesteRapido->toArray()
        ]);
    }
    public function store(ExamesLaboratoriaisRequest $request, $pacienteId)
    {
        $exameRtPcr = ExameRtPcr::create(array_merge(
            $request->except(['data_realizacao', 'resultado']),
            [
                'paciente_id' => $pacienteId
            ]
        ));

        $exameRtPcr->criarExameTesteRapido($request->only(['data_realizacao', 'resultado']), $pacienteId);

        return response()->json([
            "message" => "Exames laboratóriais específicos cadastrado com sucesso",
        ], 201);
    }
}
