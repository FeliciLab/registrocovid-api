<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvolucaoDiaria;
use App\Api\ErrorMessage;

class EvolucaoDiariaController extends Controller
{
    public function index($pacienteId)
    {
        $evolucoesDiarias = EvolucaoDiaria::where('paciente_id', $pacienteId)->get();

         return response()->json($evolucoesDiarias);
    }

    public function store($pacienteId, Request $request)
    {
        $data = array_merge($request->all(), ['paciente_id' => $pacienteId]);
        
        $evolucoesDiarias = EvolucaoDiaria::create($data);

         return response()->json($evolucoesDiarias, 201);
    }
}
