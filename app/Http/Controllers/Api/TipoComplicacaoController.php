<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoComplicacao;

class TipoComplicacaoController extends Controller
{
    /**
     * Listar Estado civil
     * 
     * @OA\Get(
     *      path="/api/tipos-complicacoes",
     *      operationId="getTiposComplicacoes",
     *      tags={"Recursos"},
     *      summary="Lista tipos de complicacoes",
     *      description="Retorna todos tipos de complicacoes cadastrados no sistema",
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
     *                              "descricao": "UTI" 
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
        return TipoComplicacao::all();
    }
}
