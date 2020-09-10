<?php

namespace App\Http\Controllers\Api\Paciente\Desfecho;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesfechoStoreRequest;
use App\Models\Desfecho;
use App\Models\TipoDesfecho;
use Illuminate\Support\Collection;
use App\Http\Resources\Desfecho as DesfechoResource;

class DesfechoController extends Controller
{

    /**
     * Exibi desfechos do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/desfecho",
     *      operationId="getDesfecho",
     *      tags={"Paciente"},
     *      summary="Exibi desfechos do paciente cadastrada",
     *      description="Mostra desfechos",
     *      security={{"apiAuth":{}}},
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
     *                          "data": {
     *                              {
     *                                   "id": 1,
     *                                   "tipo_desfecho": "Alta hospitalar",
     *                                   "tipo_autocuidado": {
     *                                      "id": 1,
     *                                      "descricao": "Mesma antes da doença"
     *                                   },
     *                                   "instituicao_transferencia": null,
     *                                   "data": "2020-09-08",
     *                                   "causa_obito": null,
     *                                   "obito_menos_24h": null,
     *                                   "obito_em_vm": null,
     *                                   "obito_em_uti": null,
     *                                   "tipo_cuidado_paliativo": null
     *                              },
     *                              {
     *                                   "id": 2,
     *                                   "tipo_desfecho": "Óbito",
     *                                   "tipo_autocuidado": null,
     *                                   "instituicao_transferencia": null,
     *                                   "data": "2020-09-11",
     *                                   "causa_obito": "Causa do óbito desconhecida",
     *                                   "obito_menos_24h": false,
     *                                   "obito_em_vm": true,
     *                                   "obito_em_uti": false,
     *                                   "tipo_cuidado_paliativo": null
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
        $desfecho = Desfecho::where('paciente_id', $pacienteId)->get();

        if (!count($desfecho)) {
            return response()->json([
                "message" => "Paciente não possui desfecho cadastrado",
                "desfecho" => [],

            ], 200);
        }

        return DesfechoResource::collection($desfecho);
    }


    /**
     * Cadastra desfecho do paciente no sistema
     *
     * @OA\Post(
     *      path="/api/pacientes/{pacienteId}/desfecho",
     *      operationId="storeDesfecho",
     *      tags={"Paciente"},
     *      summary="Cadastro de desfecho",
     *      description="Cadastro desfecho",
     *      security={{"apiAuth":{}}},
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
     *          required=true,
     *          @OA\JsonContent(
     *              required={"tipo_desfecho_id","data"},
     *              @OA\Property(property="tipo_desfecho_id", type="integer", example=1),
     *              @OA\Property(property="tipo_autocuidado_id", type="integer", example=2),
     *              @OA\Property(property="data", type="date", example="2020-09-10"),
     *              @OA\Property(property="instituicao_transferencia_id", type="integer", example=1),
     *              @OA\Property(property="tipo_cuidado_paliativo_id", type="integer", example=1),
     *              @OA\Property(property="obito_menos_24h", type="boolean", example="true"),
     *              @OA\Property(property="obito_em_vm", type="boolean", example="true"),
     *              @OA\Property(property="obito_em_uti", type="boolean", example="false"),
     *              @OA\Property(property="causa_obito", type="string", example="Causa óbito do paciente"),
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
     *                          "message": "Desfecho cadastrado com sucesso",
     *                          "desfecho": {
     *                              {
     *                                  "tipo_desfecho_id": 1,
     *                                  "tipo_autocuidado_id": 1,
     *                                  "data": "2020-09-08",
     *                                  "id": 1
     *                              },
     *                           }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DesfechoStoreRequest $request, $pacienteId)
    {
        $desfechoCollection = new Collection();

        foreach ($request->post() as $desfecho) {
            if ($desfecho['tipo_desfecho_id'] == TipoDesfecho::TIPO_OBITO && Desfecho::where('tipo_desfecho_id', TipoDesfecho::TIPO_OBITO)->exists()) {
                return response()->json([
                    "message" => "Desfecho óbito já existe",
                ], 200);
            }

            $desfechoCollection->push(
                $desfecho = Desfecho::create(array_merge(
                    $desfecho,
                    [
                        'paciente_id' => $pacienteId
                    ]
                ))
            );
        }

        return response()->json([
            "message" => "Desfecho cadastrado com sucesso",
            "desfecho" => $desfechoCollection
        ], 201);
    }
}
