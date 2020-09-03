<?php

namespace App\Http\Controllers\Api\Paciente\SuporteRespiratorio;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuporteRespiratorioStoreRequest;
use App\Models\InclusaoDesmame;
use App\Models\Pronacao;
use App\Models\SuporteRespiratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SuporteRespiratorioController extends Controller
{

    public function index($pacienteId)
    {
        $resultado = new Collection();

        $tratamentoPronacao = Pronacao::where('paciente_id', $pacienteId)->get()->toArray();
        $tratamentoInclusaoDesmame = InclusaoDesmame::where('paciente_id', $pacienteId)->get()->toArray();
        $tratamentoSuporte = SuporteRespiratorio::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($tratamentoPronacao) && !count($tratamentoInclusaoDesmame) && !count($tratamentoSuporte)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui suportes respiratorios cadastradas',
                    'suportes_respiratorios' => []
                ],
                200
            );
        }

        $resultado->push($tratamentoPronacao, $tratamentoInclusaoDesmame, $tratamentoSuporte);

        return response()->json([
            'tratamento_pronacao' => $tratamentoPronacao,
            'tratamento_inclusao_desmame' => $tratamentoInclusaoDesmame,
            'tratamento_suporte' => $tratamentoSuporte,
        ]);
    }

    public function store(SuporteRespiratorioStoreRequest $request, $pacienteId)
    {
        $resultado = new Collection();
        foreach ($request->post() as $suporte) {

            if ($suporte['tipo_suporte_id'] === 7) {
                $resultado->push(
                    Pronacao::create(array_merge(
                        $suporte,
                        [
                            'paciente_id' => $pacienteId
                        ]
                    ))
                );
            }

            if ($suporte['tipo_suporte_id'] === 8) {
                $resultado->push(
                    InclusaoDesmame::create(array_merge(
                        $suporte,
                        [
                            'paciente_id' => $pacienteId
                        ]
                    ))
                );
            }

            if ($suporte['tipo_suporte_id'] < 7) {
                $resultado->push(
                    SuporteRespiratorio::create(array_merge(
                        $suporte,
                        [
                            'paciente_id' => $pacienteId
                        ]
                    ))
                );
            }
        }

        return response()->json([
            "message" => "Suportes Respiratorios cadastrado com sucesso",
            "suporte_respiratorio" => $resultado
        ], 201);
    }
}
