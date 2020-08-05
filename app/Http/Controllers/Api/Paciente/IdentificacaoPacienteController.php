<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Http\Resources\Paciente as PacienteResource;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\IdentificacaoPacienteRequest;

class IdentificacaoPacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function index($pacienteId)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();

            return response()->json($paciente->toArray());

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

    public function store(IdentificacaoPacienteRequest $request, $pacienteId)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();
            
            if($paciente->verificaSeExisteIdentificacaoPaciente())
            {
                return response()->json(['message' => 'Identificação do paciente já existe'], 403);
            }

            $dadosAtualizar = $request->except('telefone_casa', 'telefone_celular', 'telefone_trabalho', 'telefone_vizinho');
            
            $paciente->update($dadosAtualizar);
            
            $paciente->associarTelefonesPaciente($request->only('telefone_casa', 'telefone_celular', 'telefone_trabalho', 'telefone_vizinho'));

            return response()->json(
                [
                    'message' => 'Identificação do paciente cadastrado com sucesso',
                ], 201);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
