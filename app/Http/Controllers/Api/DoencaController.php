<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doenca;

class DoencaController extends Controller
{
    /**
     * Listar todas as doencas
     * 
     * @OA\Get(
     *      path="/api/doencas",
     *      operationId="getDoencas",
     *      tags={"Recursos"},
     *      summary="Lista doenças",
     *      description="Retorna todas doenças cadastradas no sistema",
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
     *                              "tipo_doenca": 1,
     *                              "descricao": "Doença arterial coronariana" 
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
        return Doenca::all();
    }
}
