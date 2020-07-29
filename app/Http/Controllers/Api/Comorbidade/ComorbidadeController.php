<?php

namespace App\Http\Controllers\Api\Comorbidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComorbidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $data = $request->all();

            if (!Paciente::find($paciente_id)) {
                return response()->json(['message' => 'Paciente não existe'], 400);
            }

            if (Historico::where('paciente_id', $paciente_id)->exists()) {
                return response()->json(['message' => 'Paciente já possui historico'], 400);
            }

            if ($request->has('situacao_uso_drogas_id')
                && !SituacaoUsoDrogas::find($request->get('situacao_uso_drogas_id'))) {
                return response()->json(['message' => 'Situação não existe'], 400);
            }

            $historico = $this->historico->create($data);

            if(isset($data['drogas']) && count($data['drogas'])) {
                foreach($data['drogas'] as $droga_id) {
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
}
