<?php

namespace App\Http\Controllers\Api\Paciente\TratamentoSuporte;

use App\Http\Controllers\Controller;
use App\Http\Requests\TratamentoSuporteStoreRequest;
use App\Models\TratamentoSuporte;
use Illuminate\Support\Collection;

class TratamentoSuporteController extends Controller
{

    public function index($pacienteId)
    {
        $tratamentoSuportes = TratamentoSuporte::where('paciente_id', $pacienteId)->get()->toArray();

        if(!count($tratamentoSuportes)) {
            return response()->json([
                "message" => "Paciente não possui tratamentos de suporte hemodiálise",
                "tratamentos_suportes" => $tratamentoSuportes
            ], 200);
        }

        return response()->json([
            "tratamentos_suportes" => $tratamentoSuportes
        ]);
    }

    public function store(TratamentoSuporteStoreRequest $request, $pacienteId)
    {

        $resultado = new Collection();
        foreach ($request->post() as $tratamento) {
            $resultado->push(
                TratamentoSuporte::create([
                    'paciente_id' => (int) $pacienteId,
                    'data_hemodialise' => $tratamento['data_hemodialise'],
                    'motivo_hemodialise' => $tratamento['motivo_hemodialise'],
                    'frequencia_hemodialise' => $tratamento['frequencia_hemodialise']
                ])
            );
        }

        return response()->json([
            "message" => "Tramento de suporte hemodialise cadastrado com sucesso",
            "tratamentos_suportes" => $resultado
        ], 201);
    }
}
