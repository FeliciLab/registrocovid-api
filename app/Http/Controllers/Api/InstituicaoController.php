<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;

class InstituicaoController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/instituicoes",
     *      operationId="getInstituicoes",
     *      tags={"Recursos"},
     *      summary="Lista instituições",
     *      description="Retorna todas instituições cadastradas no sistema",
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
     *                              "nome": "Hospital Leonardo da Vinci" 
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
        return Instituicao::all()->toArray();
    }
}
