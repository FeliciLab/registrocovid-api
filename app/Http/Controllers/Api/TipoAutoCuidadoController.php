<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoAutoCuidado;

class TipoAutoCuidadoController extends Controller
{

    /**
     * Lista tipos de auto cuidado
     *
     * @OA\Get(
     *      path="/api/tipos-auto-cuidado",
     *      operationId="getTipoAutoCuidado",
     *      tags={"Recursos"},
     *      summary="Lista tipos de auto cuidado",
     *      description="Retorna todos tipos de autocuidado",
     *      security={{"apiAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          {
     *                              "id": 1,
     *                              "descricao": "Mesma antes da doença"
     *                          },
     *                          {
     *                               "id": 2,
     *                               "descricao": "Pior"
     *                          },
     *                          {
     *                               "id": 3,
     *                               "descricao": "Desconhecida"
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
    public function index()
    {
        return TipoAutoCuidado::all()->toArray();
    }
}
