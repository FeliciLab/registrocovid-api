<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Complicacao;
use Illuminate\Http\Request;

class ComplicacaoController extends Controller
{
    public function index($pacienteId)
    {
        $complicacoes = Complicacao::where('paciente_id', $pacienteId)->get();

        return response()->json($complicacoes);
    }

    public function store($pacienteId, Request $request)
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
