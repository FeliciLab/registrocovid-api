<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Exception;
use Illuminate\Support\Facades\Validator;

class IdentificacaoPaciente extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function store(Request $request, $id)
    {
        try {
            $dataValidated = Validator::make($request->all(), [
                'bairro_id' => 'integer',
                'data_internacao' => 'integer',
                'sexo' => 'max:1',
                'data_nascimento' => 'date',
                'estado_nascimento_id' => 'integer',
                'escolaridade_id' => 'integer',
                'atividadeprofissional_id' => 'integer',
                'qtd_pessoas_domicilio' => 'integer' 
            ]);

            if ($dataValidated->fails()) {
                $errors = $dataValidated->errors();
                return response()->json($errors, 400);
            }
            
            $pacienteInstance = $this->paciente->find($id);

            $pacienteInstanceUpdated = $pacienteInstance->fill(array_merge($pacienteInstance->toArray(), $request->post()));

            $pacienteInstanceUpdated->update();
            
            $pacienteInstance->associarTelefonesPaciente($request->post());

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

}
