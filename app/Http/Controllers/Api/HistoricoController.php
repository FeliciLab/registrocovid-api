<?php

namespace App\Http\Controllers\Api;

use App\Api\ErrorMessage;
use App\Models\Historico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HistoricoRequest;

class HistoricoController extends Controller
{
    private $historico;

    public function __construct(Historico $historico)
    {
        $this->historico = $historico;
    }

    public function show($paciente_id)
    {
        try {

            $historico = $this->historico->where('paciente_id', $paciente_id)->first();

            if (!isset($historico)) {
                throw new \Exception('Paciente não possui historico cadastrado', $code = 400);
            }
            
            $drogas = $this->historico->find($historico->id)->drogas()->get();

            $historico['drogas'] = $drogas;

            return response()->json($historico);

        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage(), $e->getCode());
            return response()->json($message->getMessage(), $message->getCode());
        }
    }

    public function store(HistoricoRequest $request)
    {
        try {

            $data = $request->all();

            $historico = $this->historico->create($data);

            if(isset($data['drogas']) && count($data['drogas'])) {
                $historico->drogas()->sync($data['drogas']);
            }

            return response()->json($historico);

        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage(), $e->getCode());
            return response()->json($message->getMessage(), $message->getCode());
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
            $message = new ErrorMessage($e->getMessage(), $e->getCode());
            return response()->json($message->getMessage(), $message->getCode());
        }
    }
}
