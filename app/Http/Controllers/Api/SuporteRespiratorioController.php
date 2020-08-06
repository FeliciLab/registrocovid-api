<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoSuporteRespiratorio;

class SuporteRespiratorioController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/suportes-respiratorios",
     *      operationId="getSuporteRespiratorio",
     *      tags={"Recursos"},
     *      summary="Lista suportes respiratórios",
     *      description="Retorna todos os suportes respiratórios cadastrados no sistema",
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
     *                              "nome": "Máscara de reservatório" 
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     */
    public function index()
    {
        return TipoSuporteRespiratorio::all()->toArray();
    }
}
