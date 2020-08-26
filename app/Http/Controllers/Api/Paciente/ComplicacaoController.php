<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplicacaoRequest;
use App\Models\Complicacao;

class ComplicacaoController extends Controller
{
    public function index($pacienteId)
    {
        $complicacoes = Complicacao::where('paciente_id', $pacienteId)->get();

        return response()->json($complicacoes);
    }

    public function show($complicacoId)
    {
        $complicacao = Complicacao::where('id', $complicacoId)->first();

        return response()->json($complicacao);
    }

    public function store($pacienteId, ComplicacaoRequest $request)
    {
        $complicacoesData = $request->all();
        $complicacoes = [];

        foreach ($complicacoesData as $complicacaoData) {
            $data = array_merge($complicacaoData, ['paciente_id' => $pacienteId]);
            $complicacao = Complicacao::create($data);
            array_push($complicacoes, $complicacao);
        }

        return response()->json($complicacoes, 201);
    }
}
