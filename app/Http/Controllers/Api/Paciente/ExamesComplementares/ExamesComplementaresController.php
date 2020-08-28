<?php

namespace App\Http\Controllers\Api\Paciente\ExamesComplementares;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamesComplementaresRequest;
use App\Services\ExamesComplementares;

class ExamesComplementaresController extends Controller
{

    public function store(ExamesComplementaresRequest $request, $pacienteId)
    {
        $resultadosExames = ExamesComplementares::salvaExamesComplementares($request->examescomplementares, $pacienteId);
        return response()->json(["message" => "Exames cadastrados com sucesso."], 201);
    }
}
