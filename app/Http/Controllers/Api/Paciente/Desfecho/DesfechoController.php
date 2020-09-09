<?php

namespace App\Http\Controllers\Api\Paciente\Desfecho;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesfechoStoreRequest;
use App\Models\Desfecho;
use App\Models\TipoDesfecho;
use Illuminate\Support\Collection;
use App\Http\Resources\Desfecho as DesfechoResource;

class DesfechoController extends Controller
{

    public function index($pacienteId)
    {
        $desfecho = Desfecho::where('paciente_id', $pacienteId)->get();

        if (!count($desfecho)) {
            return response()->json([
                "message" => "Paciente não possui desfecho cadastrado",
                "desfecho" => [],

            ], 200);
        }

        return DesfechoResource::collection($desfecho);
    }

    public function store(DesfechoStoreRequest $request, $pacienteId)
    {

        $desfechoCollection = new Collection();

        foreach ($request->post() as $desfecho) {

            if ($desfecho['tipo_desfecho_id'] == TipoDesfecho::TIPO_OBITO && Desfecho::where('tipo_desfecho_id', TipoDesfecho::TIPO_OBITO)->exists()) {
                return response()->json([
                    "message" => "Desfecho óbito já existe",
                ], 200);
            }

            $desfechoCollection->push(
                $desfecho = Desfecho::create(array_merge(
                    $desfecho,
                    [
                        'paciente_id' => $pacienteId
                    ]
                ))
            );
        }

        return response()->json([
            "message" => "Desfecho cadastrado com sucesso",
            "desfecho" => $desfechoCollection
        ], 201);
    }
}
