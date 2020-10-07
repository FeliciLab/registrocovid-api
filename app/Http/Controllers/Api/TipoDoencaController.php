<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDoenca;

class TipoDoencaController extends Controller
{
    /**
     * Listar Estado civil
     *
     * @OA\Get(
     *      path="/api/tipos-doencas",
     *      operationId="getTiposDoencas",
     *      tags={"Recursos"},
     *      summary="Lista tipos de doenças",
     *      description="Retorna todos tipos de doenças cadastrados no sistema",
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
     *                              "descricao": "Doença cardíaca"
     *                          }
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
        return TipoDoenca::all();
    }
}
