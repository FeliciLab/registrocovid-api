<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Http\Resources\Paciente as PacienteResource;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class IdentificacaoPacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function index($id)
    {
        try {

            return new PacienteResource($this->paciente->findOrFail($id));

        }catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Paciente não existe'
            ], 404);
        }
        catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
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

            $verificaIdentificacao =  $pacienteInstance->verificaSeExisteIdentificacaoPaciente();

            if($verificaIdentificacao)
            {
                return response()->json(['message' => 'Identificação do paciente já existe'], 403);
            }

            $pacienteInstanceUpdated = $this->paciente->where('id', $id)->update($request->except('telefone_casa', 'telefone_celular', 'telefone_trabalho', 'telefone_vizinho'));
            
            $pacienteInstance->associarTelefonesPaciente($request->post());

            return response()->json(
                [
                    'message' => 'Identificação do paciente cadastrado com sucesso',
                ], 201);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

}
