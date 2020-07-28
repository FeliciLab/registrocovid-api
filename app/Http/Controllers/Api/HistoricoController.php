<?php

namespace App\Http\Controllers\Api;

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
            
            $drogas = $this->historico->find($historico->id)->drogas()->get();

            $historico['drogas'] = $drogas;

            return response()->json($historico);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function store(HistoricoRequest $request)
    {
        $data = $request->all();

        try {
            $historico = $this->historico->create($data);

            if(isset($data['drogas']) && count($data['drogas'])) {
                $historico->drogas()->sync($data['drogas']);
            }

            return response()->json($historico);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update($id, HistoricoRequest $request)
    {
        $data = $request->all();

        try {
            $historico = $this->historico->findOrFail($id);
            $historico->update($data);

            return response()->json([
                'msg' => 'Historico atualizado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
