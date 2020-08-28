<?php

namespace App\Http\Controllers\Api\Paciente\ExamesComplementares;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamesComplementaresRequest;
use App\Services\ExamesComplementares;
use App\Model\ExameComplementar;

class ExamesComplementaresController extends Controller
{

    public function store(ExamesComplementaresRequest $request, $pacienteId)
    {
        $resultadosExames = ExamesComplementares::salvaExamesComplementares(
            $request->examescomplementares, $pacienteId);
        return response()->json(["message" => "Exames cadastrados com sucesso."], 201);
    }


    public function index($pacienteId)
    {
        [$response, $status] = ExamesComplementares::mostrarExamesComplementares($pacienteId);
        return response()->json($response, $status);
    }
}
