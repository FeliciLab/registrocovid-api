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
        try{
            [$response, $statusCode] = ExamesComplementares::salvaExamesComplementares(
                $request->examescomplementares, $pacienteId
            );
            
        }catch (\Exception $e) {
            $responseMessage = new ErrorMessage($e->getMessage());
            $statusCode = 500;
        }

        
        
        return response()->json($response, $statusCode);
    }


    public function index($pacienteId)
    {
        [$response, $statusCode] = ExamesComplementares::mostrarExamesComplementares($pacienteId);
        return response()->json($response, $statusCode);
    }
}
