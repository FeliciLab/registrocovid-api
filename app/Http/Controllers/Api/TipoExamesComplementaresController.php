<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoExameComplementar;

class TipoExamesComplementaresController extends Controller
{

    /**
     * Lista os tipos de exames complementares cadastrados no sistema
     * 
     * @OA\Get(
     *      path="/api/tipos-exames-complementares",
     *      operationId="getTipoExamesComplementares",
     *      tags={"Recursos"},
     *      summary="Lista os tipos de exames complementares",
     *      description="Retorna todos os tipos de exames complementares cadastrados no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                         [
     *                              {
     *                                   "id": 1,
     *                                   "descricao": "Tomografia computadorizada de tórax"
     *                               },
     *                               {
     *                                   "id": 2,
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
    public function index()
    {
        return TipoExameComplementar::all();
    }
}
