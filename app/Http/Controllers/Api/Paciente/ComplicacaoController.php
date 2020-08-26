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

    // public function store($pacienteId, Request $request)
    // {
    //     $data = array_merge($request->all(), ['paciente_id' => $pacienteId]);
        
    //     $evolucoesDiarias = EvolucaoDiaria::create($data);

    //     return response()->json($evolucoesDiarias, 201);
    // }
}
