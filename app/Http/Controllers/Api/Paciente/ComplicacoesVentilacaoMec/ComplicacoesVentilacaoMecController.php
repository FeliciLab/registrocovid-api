<?php

namespace App\Http\Controllers\Api\Paciente\ComplicacoesVentilacaoMec;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplicacaoVentilacaoMecanicaRequest;
use App\Http\Requests\ComplicacoesVentilacaoMecRequest;
use App\Models\ComplicacaoVentilacaoMec;
use App\Models\TransfusaoOcorrencia;
use Illuminate\Http\Request;

class ComplicacoesVentilacaoMecController extends Controller
{
    public function index($pacienteId)
    {
        $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::where('paciente_id', $pacienteId)->get()->toArray();
        $transfusaoOcorrencia = TransfusaoOcorrencia::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($complicacaoVentilacaoMec) && !count($transfusaoOcorrencia)) {
            return response()->json(['message' => 'Paciente não possui complicações cadastradas'], 404);
        }

        return response()->json([
            'complicacoes_ventilacao_mecanica' => $complicacaoVentilacaoMec,
            'transfussoes_ocorrencia' => $transfusaoOcorrencia
        ]);
    }

    public function store(ComplicacaoVentilacaoMecanicaRequest $request, $pacienteId)
    {
        if ($request->has(['tipo_complicacao_id', 'data_complicacao'])) {
            $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::create(array_merge(
                $request->only(['tipo_complicacao_id', 'data_complicacao', 'descricao']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));

            if ($request->input('tipo_complicacao_id') == 4) {
                $transfusaoOcorrencia = new TransfusaoOcorrencia();
                $transfusaoOcorrencia->data_transfusao = $request->data_complicacao;
                $transfusaoOcorrencia->volume_transfusao = $request->volume_transfusao;
                $transfusaoOcorrencia->paciente_id = $pacienteId;
                $transfusaoOcorrencia->save();
            }
        }

        if ($request->has(['tipo_transfusao_id', 'data_transfusao', 'volume_transfusao'])) {
            $transfusaoOcorrencia = TransfusaoOcorrencia::create(array_merge(
                $request->only(['tipo_transfusao_id', 'data_transfusao', 'volume_transfusao']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));
        }

        return response()->json([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
            "ventilacao_mecanica" => isset($complicacaoVentilacaoMec) ? $complicacaoVentilacaoMec->toArray() : [],
            "transfusao_ocorrencia" => isset($transfusaoOcorrencia) ? $transfusaoOcorrencia->toArray() : []
        ], 201);
    }
}
