<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDesfecho;
use Illuminate\Http\Request;

class TipoDesfechoController extends Controller
{

    /**
     * Lista tipos de desfechos
     *
     * @OA\Get(
     *      path="/api/tipos-desfecho",
     *      operationId="getTipoDesfecho",
     *      tags={"Recursos"},
     *      summary="Lista tipos de desfechos",
     *      description="Retorna todos tipos de desfechos cadastrados no sistema",
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
     *                               "id": 1,
     *                               "descricao": "Alta hospitalar"
     *                          },
     *                          {
     *                               "id": 2,
     *                               "descricao": "Transferência para outro serviço"
     *                          },
     *                          {
     *                               "id": 3,
     *                               "descricao": "Cuidados paliativos"
     *                          },
     *                          {
     *                               "id": 4,
     *                               "descricao": "Óbito"
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
        return TipoDesfecho::all()->toArray();
    }
}
