<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Escolaridade;

class EscolaridadeController extends Controller
{
    /**
     * Listar escolaridades
     *
     * @OA\Get(
     *      path="/api/escolaridades",
     *      operationId="getCores",
     *      tags={"Recursos"},
     *      summary="Lista escolaridades",
     *      description="Retorna todas escolaridades cadastradas no sistema",
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
     *                              "nome": "Analfabeto"
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
        return Escolaridade::all();
    }
}
