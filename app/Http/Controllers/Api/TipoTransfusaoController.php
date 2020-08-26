<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoTransfusao;
use Illuminate\Http\Request;

class TipoTransfusaoController extends Controller
{

    /**
     * Listar tipos de transfussões
     *
     * @OA\Get(
     *      path="/api/tipos-transfusao",
     *      operationId="getTiposTransfussoes",
     *      tags={"Recursos"},
     *      summary="Lista tipos de transfussões",
     *      description="Retorna todos os tipos de transfussões",
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
     *                              "descricao": "Sangue total"
     *                          },
     *                          {
     *                              "id": 2,
     *                              "descricao": "Concentrado de hemácias"
     *                          },
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TipoTransfusao::all()->toArray();
    }
}
