<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentificacaoPacienteRequest;
use App\Models\Paciente;
use App\Services\Telefone as TelefoneService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

class IdentificacaoPacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function index($pacienteId)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();

            return response()->json($paciente->toArray());
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Paciente não existe'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(IdentificacaoPacienteRequest $request, $pacienteId, TelefoneService $telefoneService)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();

            if ($paciente->verificaSeExisteIdentificacaoPaciente()) {
                return response()->json(['message' => 'Identificação do paciente já existe'], 403);
            }

            $dadosAtualizar = $request->validated();
            $paciente->update($dadosAtualizar);

            $telefoneService->associarTelefones(
                $paciente,
                Arr::only(
                    $dadosAtualizar,
                    [
                        'telefone_de_casa',
                        'telefone_celular',
                        'telefone_do_trabalho',
                        'telefone_de_vizinho'
                    ]
                )
            );

            return response()->json(
                [
                    'message' => 'Identificação do paciente cadastrado com sucesso',
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
