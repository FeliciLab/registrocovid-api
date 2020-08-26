<?php

namespace App\Http\Controllers\Api\Paciente\OutrosExames;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutrosExamesRequest;
use App\Models\OutrosExames;

class OutrosExamesController extends Controller
{
    public function store(OutrosExamesRequest $request, $pacienteId)
    {
        $resultadosExames = [];
        foreach ($request->outrosexames as $exame) {;
            $data = array_merge($exame, ['paciente_id' => $pacienteId]);
            array_push($resultadosExames, OutrosExames::create($data));
        }

        return response()->json($resultadosExames, 201);
    }
}
