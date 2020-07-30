<?php

namespace App\Http\Controllers\Api\Paciente\Historico;

use App\Api\ErrorMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoricoRequest;
use App\Models\Droga;
use App\Models\Historico;
use App\Models\Paciente;
use App\Models\SituacaoUsoDrogas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoricoController extends Controller
{
    private $historico;

    public function __construct(Historico $historico)
    {
        $this->historico = $historico;
    }

    public function show(int $pacienteId)
    {
        try {
           
            $erros = $this->validarExistenciaPaciente($pacienteId);
           
            if ($erros) {
                return response()->json(
                    [
                        'message' => 'Campos inválidos.',
                        'errors' => $erros
                    ],
                    422
                );
            }


            $historico = Historico::where('paciente_id', $pacienteId)->first();

            if (!$historico) {
                return response()->json([
                    'message' => 'Histórico não encontrado.',
                    'errors' => [
                        'paciente_id' => ['Não existe histórico para o paciente.']
                    ]
                ], 404);
            }

            return response()->json($historico->toArray());
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }

    public function store($pacienteId, HistoricoRequest $request)
    {
        try {

            $erros = $this->validarExistenciaPaciente($pacienteId);
           
            if ($erros) {
                return response()->json(
                    [
                        'message' => 'Campos inválidos.',
                        'errors' => $erros
                    ],
                    422
                );
            }

            if (Historico::where('paciente_id', $pacienteId)->exists()) {
                return response()->json(
                    (new ErrorMessage('Paciente já possui histórico.'))->toArray(),
                    400
                );
            }

            $data = array_merge($request->all(), ['paciente_id' => $pacienteId]);
            
            $historico = Historico::create($data);

            if ($request->has('drogas')) {
                $historico->drogas()->sync($request->get('drogas'));
                $historico->save();
            }

            return response()->json($historico->toArray(), 201);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }

    public function update($id, HistoricoRequest $request)
    {

        try {

            $data = $request->all();

            $historico = $this->historico->findOrFail($id);
            $historico->update($data);

            return response()->json([
                'message' => 'Historico atualizado com sucesso'
            ]);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }

    private function validarExistenciaPaciente(int $pacienteId)
    {
        $rules = [
            'paciente_id' => 'required|exists:pacientes,id',
        ];

        $validator = Validator::make(['paciente_id' => $pacienteId], $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return null;
    }
}
