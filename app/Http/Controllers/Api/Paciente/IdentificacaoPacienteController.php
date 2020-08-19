<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentificacaoPacienteRequest;
use App\Models\Paciente;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IdentificacaoPacienteController extends Controller
{
    /**
     * Mostra identificação do paciente
     * 
     * @OA\Get(
     *      path="/api/paciente/{id}/identificacao",
     *      operationId="getIdentificacao",
     *      tags={"Paciente"},
     *      summary="Mostra identificação do paciente cadastrada",
     *      description="Mostra identificação do paciente cadastrada",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID do paciente previamente cadastrado",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          "id": 1,
     *                          "prontuario": "666",
     *                          "data_internacao": "2020-01-15",
     *                          "data_atendimento_referencia": "2020-07-16",
     *                          "sexo": "F",
     *                          "data_nascimento": "1988-01-15",
     *                          "qtd_pessoas_domicilio": 2,
     *                          "caso_confirmado": null,
     *                          "data_inicio_sintomas": null,
     *                          "created_at": "2020-08-06T19:40:56.000000Z",
     *                          "updated_at": "2020-08-06T19:53:17.000000Z",
     *                          "suporte_respiratorio": true,
     *                          "reinternacao": true,
     *                          "estado": null,
     *                          "instituicao_primeiro_atendimento": {
     *                              "id": 3,
     *                              "nome": "Hospital Geral de Fortaleza"
     *                          },
     *                          "cor": {
     *                              "id": 1,
     *                              "nome": "AMARELO"
     *                          },
     *                          "estado_civil": {
     *                              "id": 1,
     *                              "nome": "CASADO"
     *                          },
     *                          "escolaridade": {
     *                              "id": 2,
     *                              "nome": "Ensino Médio"
     *                          },
     *                          "atividade_profissional": {
     *                              "id": 1,
     *                              "nome": "Futebol"
     *                          },
     *                          "instituicao_referencia": {
     *                              "id": 1,
     *                              "nome": "Hospital Leonardo da Vinci"
     *                          },
     *                          "municipio": null,
     *                          "estado_nascimento": {
     *                              "id": 1,
     *                              "nome": "Acre",
     *                              "unidade_federativa": "AC"
     *                          },
     *                          "tipo_suporte_respiratorios": {},
     *                          "telefones": {}
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pacienteId)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();

            return response()->json($paciente->toArray());
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Paciente não existe'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cadastra de identificação do paciente no sistema
     * 
     * @OA\Post(
     *      path="/api/paciente/{id}/identificacao",
     *      operationId="storeIdentificacao",
     *      tags={"Paciente"},
     *      summary="Cadastra de identificação do paciente",
     *      description="Cadastra de identificação do paciente",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID do paciente previamente cadastrado",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="atividadeprofissional_id", type="integer", example=1),
     *              @OA\Property(property="bairro_id", type="integer", example=1),
     *              @OA\Property(property="cor_id", type="integer", example=1),
     *              @OA\Property(property="data_internacao", type="string", example="2020-05-01"),
     *              @OA\Property(property="data_nascimento", type="string", example="2020-05-01"),
     *              @OA\Property(property="escolaridade_id", type="integer", example=1),
     *              @OA\Property(property="estado_nascimento_id", type="integer", example=1),
     *              @OA\Property(property="estadocivil_id", type="integer", example=1),
     *              @OA\Property(property="qtd_pessoas_domicilio", type="integer", example=1),
     *              @OA\Property(property="sexo", type="string", enum={"F", "M"}),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          "message": "Identificação do paciente cadastrado com sucesso"
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(
     *          response=422,
     *          description="Paciente não encontrado.",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          "message": "Campos inválidos.",
     *                          "errors": {
     *                              {"paciente_id": {"O campo paciente id não é válido"}}
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     * )
     */
    public function store(IdentificacaoPacienteRequest $request, $pacienteId)
    {
        try {
            $paciente = Paciente::whereId($pacienteId)->first();

            if ($paciente->verificaSeExisteIdentificacaoPaciente()) {
                return response()->json(['message' => 'Identificação do paciente já existe'], 403);
            }

            $dadosAtualizar = $request->except('telefone_casa', 'telefone_celular', 'telefone_trabalho', 'telefone_vizinho');

            $paciente->update($dadosAtualizar);

            $paciente->associarTelefonesPaciente($request->only('telefone_casa', 'telefone_celular', 'telefone_trabalho', 'telefone_vizinho'));

            return response()->json(
                [
                    'message' => 'Identificação do paciente cadastrado com sucesso',
                ],
                201
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
