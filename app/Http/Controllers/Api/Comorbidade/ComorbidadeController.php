<?php

namespace App\Http\Controllers\Api\Comorbidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comorbidades\Comorbidade;
use App\Models\Paciente;
use App\Api\ErrorMessage;

class ComorbidadeController extends Controller
{

    private $comorbidade;

    public function __construct(Comorbidade $comorbidade)
    {
        $this->comorbidade = $comorbidade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($paciente_id)
    {
        try {

            if (!Paciente::find($paciente_id)) {
                return response()->json(['message' => 'Paciente não existe'], 400);
            }

            $comorbidade = $this->comorbidade->where('paciente_id', $paciente_id)->first();

            if (!isset($comorbidade)) {
                return response()->json(['message' => 'Paciente não possui histórico cadastrado'], 400);
            }
            
            return response()->json($comorbidade);

        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($paciente_id, Request $request)
    {
        try {

            $data = $request->all();

            $data["paciente_id"] = $paciente_id;

            if (!Paciente::find($paciente_id)) {
                return response()->json(['message' => 'Paciente não existe'], 400);
            }

            if (Comorbidade::where('paciente_id', $paciente_id)->exists()) {
                return response()->json(['message' => 'Paciente já possui comorbidade'], 400);
            }

            $comorbidade = $this->comorbidade->create($data);

            return response()->json($comorbidade);

        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
