<?php

namespace App\Http\Controllers\Api\Paciente\OutrosExames;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutrosExamesRequest;
use App\Models\OutrosExames;

class OutrosExamesController extends Controller
{
    public function store(OutrosExamesRequest $request, $pacienteId)
    {
        $data = array_merge($request->all(), ['paciente_id' => $pacienteId]);
        $outrosexames = OutrosExames::create($data);

        return response()->json($outrosexames, 201);
    }
}
