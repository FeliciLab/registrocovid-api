<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cor;

class CorController extends Controller
{
    /**
     * Listar cores
     * 
     * @OA\Get(
     *      path="/api/cores",
     *      operationId="getCores",
     *      tags={"Recursos"},
     *      summary="Lista cores",
     *      description="Retorna todas cores cadastrados no sistema",
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
     *                              "nome": "Amarelo" 
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
        return Cor::all();
    }
}
