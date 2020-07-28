<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class PacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function store(Request $request)
    {
        try {
            $dataValidated = Validator::make($request->all(), [
                'prontuario' => 'required|unique:pacientes',
                'data_internacao' => 'required|date'
            ]);

            if ($dataValidated->fails()) {
                $errors = $dataValidated->errors();
                return response()->json($errors, 400);
            }

            $pacienteInstance = $this->paciente->fill(array_merge(
                $request->post(),
                [
                    'coletador_id' => auth()->user()->id,
                    'instituicao_id' => auth()->user()->instituicao_id
                ]
            ));

            $pacienteInstance->save();

            $pacienteInstance->associarPacienteTipoSuporteRespiratorio($request->post());

            return response()->json(
                [
                    'message' => 'Paciente cadastrado com sucesso',
                    'paciente' => $pacienteInstance->toArray()
                ], 201);
        }
        catch (Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

}
