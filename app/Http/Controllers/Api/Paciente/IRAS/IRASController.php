<?php

namespace App\Http\Controllers\Api\Paciente\IRAS;

use App\Http\Controllers\Controller;
use App\Http\Requests\IRASRequest;
use App\Services\IRASService;
use App\Model\IRAS;

class IRASController extends Controller
{

    /**
     * Cadastra infecções relacionadas à assistência à saúde no sistema
     *
     * @OA\Post(
     *      path="/api/iras",
     *      operationId="storeIRAS",
     *      tags={"Recursos"},
     *      summary="Cadastra infecções relacionadas à assistência à saúde",
     *      description="Cadastra infecções relacionadas à assistência à saúde no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="iras",
     *                type="array",
     *                example={
     *                   {
     *                       "tipo_iras_id" : 1,
     *                       "data" : "2020-04-01",
     *                       "descricao": "Descrição da infecção"
     *                   },
     *                   {
     *                       "tipo_iras_id" : 2,
     *                       "data" : "2020-04-01",
     *                       "descricao": "Descrição da infecção"
     *                   }
     *                },
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="tipo_iras_id",
     *                         type="integer",
     *                         example="1"
     *                      ),
     *                      @OA\Property(
     *                         property="data",
     *                         type="string",
     *                         example="2020-04-01"
     *                      ),
     *                      @OA\Property(
     *                         property="descricao",
     *                         type="string",
     *                         example="Descrição da infecção"
     *                      )
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Recurso criado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                           {
     *                               "tipo_iras_id": 1,
     *                               "data": "2020-04-01",
     *                               "descricao": "Texto descrevendo a infecção.",
     *                               "paciente_id": "1",
     *                               "id": 4
     *                           }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     * @return JsonResponse
     */
    public function store(IRASRequest $request, $pacienteId)
    {
        try {
            [$response, $statusCode] = IRASService::salvaIRAS(
                $request->iras,
                $pacienteId
            );
        } catch (\Exception $e) {
            $response = $e->getMessage();
            $statusCode = 500;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Lista os infecções relacionadas à assistência à saúde de um paciente
     *
     * @OA\Get(
     *      path="/api/iras",
     *      operationId="getIRAS",
     *      tags={"Recursos"},
     *      summary="Lista as infecções relacionadas à assistência à saúde de um paciente",
     *      description="Retorna todas as infecções relacionadas à assistência à saúde de um paciente cadastradas no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                               {
     *                                   "id": 1,
     *                                   "data": "2019-12-01",
     *                                   "descricao": "Descrição da infecção",
     *                                   "tipo_exame_id": 1,
     *                                   "tipo_iras_descricao": "Tomografia computadorizada de tórax"
     *                               },
     *                               {
     *                                   "id": 2,
     *                                   "data": "2021-11-11",
     *                                   "descricao": "Descrição da infecção",
     *                                   "tipo_exame_id": 2,
     *                                   "tipo_iras_descricao": "Eletrocardiograma"
     *                               }
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
        [$response, $statusCode] = IRASService::mostrarIRAS($pacienteId);

        return response()->json($response, $statusCode);
    }
}
