<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RtPcrResultado;
use Illuminate\Http\Request;

class ResultadoPcrController extends Controller
{
    /**
     * Lista todos os resulta PCR possíveis
     *
     * @OA\Get(
     *      path="/api/pcr-resultado",
     *      operationId="getPcrResultado",
     *      tags={"Recursos"},
     *      summary="Lista resultados pcr",
     *      description="Retorna todos resultados pcr cadastrados no sistema",
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
     *                              "descricao": "Detectável"
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
        return RtPcrResultado::all();
    }
}
