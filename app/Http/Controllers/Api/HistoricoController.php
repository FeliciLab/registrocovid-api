<?php

namespace App\Http\Controllers\Api;

use App\Models\Historico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    private $historico;

    public function __construct(Historico $historico)
    {
        $this->historico = $historico;
    }

    public function show($id)
    {
        try {

            $historico = $this->historico->where('paciente_id', $id)->first();

            return response()->json($historico, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {

            $historico = $this->historico->create($data);

            return response()->json([
                'msg' => 'Historico cadastrado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update($id, Request $request)
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
