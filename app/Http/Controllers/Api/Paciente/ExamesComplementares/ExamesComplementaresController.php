<?php

namespace App\Http\Controllers\Api\Paciente\ExamesComplementares;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamesComplementaresRequest;
use App\Services\ExamesComplementares;
use App\Model\ExameComplementar;

class ExamesComplementaresController extends Controller
{

    /**
     * Cadastra exames complementares no sistema
     *
     * @OA\Post(
     *      path="/api/exames-complementares",
     *      operationId="storeExamesComplementares",
     *      tags={"Recursos"},
     *      summary="Cadastra exames complementares",
     *      description="Cadastra exames complementares no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="descricao", type="string")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Recurso criado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          "examescomplementares" : [
     *                               {
     *                                   "tipo_exames_complementares_id" : 1,
     *                                   "data" : "2020-04-01",
     *                                   "resultado": "Resultado do Exame"
     *                               }
     *
     *                           ]
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     * @return JsonResponse
     */
    public function store(ExamesComplementaresRequest $request, $pacienteId)
    {
        try {
            [$response, $statusCode] = ExamesComplementares::salvaExamesComplementares(
                $request->examescomplementares,
                $pacienteId
            );
        } catch (\Exception $e) {
            $response = $e->getMessage();
            $statusCode = 500;
        }
        
        return response()->json($response, $statusCode);
    }

    /**
     * Lista os exames complementares de um paciente
     *
     * @OA\Get(
     *      path="/api/exames-complementares",
     *      operationId="getExamesComplementares",
     *      tags={"Recursos"},
     *      summary="Lista os exames complementares de um paciente",
     *      description="Retorna todos os exames complementares de um paciente cadastrados no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          [
     *                               {
     *                                   "id": 1,
     *                                   "data": "2020-04-01",
     *                                   "resultado": "Texto do Resultado",
     *                                   "tipo_exame_id": 1,
     *                                   "descricao": "Tomografia computadorizada de tórax"
     *                               },
     *                               {
     *                                   "id": 2,
     *                                   "data": "2020-04-01",
     *                                   "resultado": "Texto do Resultado",
     *                                   "tipo_exame_id": 2,
     *                                   "descricao": "Eletrocardiograma"
     *                               }
     *                           ]
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
        [$response, $statusCode] = ExamesComplementares::mostrarExamesComplementares($pacienteId);

        return response()->json($response, $statusCode);
    }
}
