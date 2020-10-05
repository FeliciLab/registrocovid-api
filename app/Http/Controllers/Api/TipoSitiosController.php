<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoSitio;

class TipoSitiosController extends Controller
{
    /**
     * Lista tipos de sitio rt pcr
     *
     * @OA\Get(
     *      path="/api/sitios-rt-pcr",
     *      operationId="getTipoSitios",
     *      tags={"Recursos"},
     *      summary="Lista tipos de sitio",
     *      description="Retorna todos tipos de sitio cadastrados no sistema",
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
     *                              "descricao": "Swab de nasofaringe/orofaringe"
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
        return TipoSitio::all();
    }
}
