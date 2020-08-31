<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoComplicacaoVM;
use Illuminate\Http\Request;

class TipoComplicacaoVMController extends Controller
{
    /**
     * Listar tipos de complicações ventilação mecânica
     *
     * @OA\Get(
     *      path="/api/tipos-complicacao-vm",
     *      operationId="getTiposComplicacaoesVM",
     *      tags={"Recursos"},
     *      summary="Lista tipos de complicações relacionados a ventilação mecânica",
     *      description="Retorna todos tipos de complicações relacionados a ventilação mecânica",
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
     *                              "descricao": "Pneumotórax"
     *                          },
     *                          {
     *                              "id": 2,
     *                              "descricao": "Extubação acidental"
     *                          },
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
        return TipoComplicacaoVM::all()->toArray();
    }
}
