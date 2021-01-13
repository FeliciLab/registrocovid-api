<?php

namespace App\Http\Controllers\Api\Paciente\ComplicacoesVentilacaoMec;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplicacaoVentilacaoMecanicaRequest;
use App\Models\ComplicacaoVentilacaoMec;
use Exception;

class ComplicacoesVentilacaoMecController extends Controller
{

    /**
     * Exibi complicações relacionadas a ventilação mecânica e transfussões do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/ventilacao-mecanica",
     *      operationId="getComplicacao",
     *      tags={"Paciente"},
     *      summary="Exibi complicações relacionadas a ventilação mecânica e transfussoes do paciente cadastrada",
     *      description="Mostra identificação do paciente cadastrada",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID do paciente previamente cadastrado",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
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
     *                          "complicacoes_ventilacao_mecanica": {
     *                              {
     *                                  "id": 1,
     *                                  "data_complicacao": "2020-08-19",
     *                                  "descricao": "descricao qualquer",
     *                                  "tipo_complicacao": {
     *                                       "id": 1,
     *                                       "descricao": "Pneumotórax"
     *                                   }
     *                              }
     *                          }
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
        $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($complicacaoVentilacaoMec)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui complicações cadastradas',
                    'complicacoes_ventilacao_mecanica' => []
                ],
                200
            );
        }

        return response()->json([
            'complicacoes_ventilacao_mecanica' => $complicacaoVentilacaoMec
        ]);
    }


    /**
     * Cadastra complicaçãoes relacionadas a ventilação mecânica do paciente no sistema
     *
     * @OA\Post(
     *      path="/api/pacientes/{pacienteId}/ventilacao-mecanica",
     *      operationId="storeComplicacaoVentilacaoMecanica",
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
     *          description="Os campos a seguir não são obrigatórios para inserção.",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"tipo_complicacao_id","data_complicacao"}
     *              @OA\Property(property="tipo_complicacao_id", type="integer", example=4),
     *              @OA\Property(property="data_complicacao", type="string", example="2020-08-19"),
     *              @OA\Property(property="descricao", type="string", example="descricao da complicacao")
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
     *                          "message": "Complicação ventilação mecânica cadastrado com sucesso",
     *                          "ventilacao_mecanica": {
     *                              "data_complicacao": "2020-08-19",
     *                              "descricao": "descricao da complicacao",
     *                              "id": 2
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(ComplicacaoVentilacaoMecanicaRequest $request, $pacienteId)
    {
        try {
            $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::create(array_merge(
                $request->all(),
                [
                'paciente_id' => $pacienteId
            ]
            ));

            return response()->json([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
            "ventilacao_mecanica" => $complicacaoVentilacaoMec->toArray(),
        ], 201);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
