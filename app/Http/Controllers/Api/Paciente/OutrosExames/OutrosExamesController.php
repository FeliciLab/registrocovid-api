<?php

namespace App\Http\Controllers\Api\Paciente\OutrosExames;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutrosExamesRequest;
use App\Services\OutrosExames;

class OutrosExamesController extends Controller
{
    public function store(OutrosExamesRequest $request, $pacienteId)
    {
        $resultadosExames = OutrosExames::salvaOutrosExames($request->outrosexames, $pacienteId);
        return response()->json($resultadosExames, 201);
    }
}
