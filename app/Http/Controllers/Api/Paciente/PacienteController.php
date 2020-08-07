<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteStoreRequest;
use App\Http\Requests\PacienteUpdateRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Exception;
use App\Api\ErrorMessage;
use App\Repositories\PacienteRepository;

class PacienteController extends Controller
{
    public function index(Request $request, Paciente $pacientes)
    {
        $pacienteRepository = new PacienteRepository($pacientes, $request);

        return response()->json($pacienteRepository->getResult());
    }

    public function store(PacienteStoreRequest $request)
    {
        try {
            $paciente = Paciente::create(array_merge(
                $request->post(),
                [
                    'coletador_id' => auth()->user()->id,
                    'instituicao_id' => auth()->user()->instituicao_id
                ]
            ));
            $paciente->associarPacienteTipoSuporteRespiratorio($request->post());

            return response()->json(
                [
                    'message' => 'Paciente cadastrado com sucesso',
                    'paciente' => $paciente->toArray()
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(int $pacienteId, PacienteUpdateRequest $request)
    {
        try {
            $paciente = Paciente::find($pacienteId);
            $paciente->update($request->only('caso_confirmado', 'outros_sintomas', 'data_inicio_sintomas'));
            $paciente->refresh();
            return $paciente->toArray();
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
