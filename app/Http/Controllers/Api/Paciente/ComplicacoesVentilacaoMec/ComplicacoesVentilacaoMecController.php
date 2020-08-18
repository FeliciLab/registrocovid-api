<?php

namespace App\Http\Controllers\Api\Paciente\ComplicacoesVentilacaoMec;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplicacoesVentilacaoMecRequest;
use App\Models\ComplicacaoVentilacaoMec;
use App\Models\TransfusaoOcorrencia;
use Illuminate\Http\Request;

class ComplicacoesVentilacaoMecController extends Controller
{
    public function store(Request $request, $pacienteId)
    {
        if($request->has(['tipo_complicacao_id', 'data_ventilacao_mec'])) {
            $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::create(array_merge(
                $request->only(['tipo_complicacao_id', 'data_ventilacao_mec', 'descricao']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));
        }

        if($request->has(['tipo_transfusao_id', 'data_transfusao', 'volume_transfusao'])) {
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
