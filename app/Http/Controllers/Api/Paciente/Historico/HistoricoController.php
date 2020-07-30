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
            $rules = [
                'paciente_id' => 'required|exists:pacientes,id',
            ];

            $validator = Validator::make(['paciente_id' => $pacienteId], $rules);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'message' => 'Campos inválidos.',
                        'errors' => $validator->errors()
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

    public function store($paciente_id, HistoricoRequest $request)
    {
        try {

            $data = $request->all();

            $data["paciente_id"] = $paciente_id;

            if (!Paciente::find($paciente_id)) {
                return response()->json(['message' => 'Paciente não existe'], 400);
            }

            if (Historico::where('paciente_id', $paciente_id)->exists()) {
                return response()->json(['message' => 'Paciente já possui historico'], 400);
            }

            if (
                $request->has('situacao_uso_drogas_id')
                && !SituacaoUsoDrogas::find($request->get('situacao_uso_drogas_id'))
            ) {
                return response()->json(['message' => 'Situação não existe'], 400);
            }

            $historico = $this->historico->create($data);

            if (isset($data['drogas']) && count($data['drogas'])) {
                foreach ($data['drogas'] as $droga_id) {
                    if (!Droga::find($droga_id)) {
                        return response()->json(['message' => "Droga de id $droga_id não existe"], 400);
                    }
                }

                $historico->drogas()->sync($data['drogas']);
            }

            return response()->json($historico);
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
}
